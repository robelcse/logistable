<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shop;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;

class CustomerController extends Controller
{
    private $url             = 'https://productforsell.com/';
    private $consumer_key    = 'ck_8716617dae507f8b48afde7278695e17520b8595';
    private $consumer_secret = 'cs_8422ecf12bc8bf4f45846dfa51869fa264a3b6a8';

    private $page           = 1;
    private $total_customer = 0;


    /**
     * 
     * get list of customer
     * 
     * @return array of customer
     * 
     */
    public function index()
    {

        /*
        $shop        = Shop::find(5);
        $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
            'wp_api'  => true,
            'version' => 'wc/v3'
        ]);
        return $customers = $woocommerce->get('coupons');
       */

        $customers = Customer::with('shop')->orderBy('customer_id','desc')->paginate(12);
        return view('customer.customers', ['title' => 'Customers', 'customers' => $customers]);
    }

    /**
     * 
     * show customer by id
     * 
     * @param int $id
     * 
     * @return Object of customer
     * 
     */

    public function show($id)
    {

        $customer             = Customer::with('shop')->findOrFail($id);
        $shop                 = $customer['shop'];
        $customer_obj         = json_decode($customer->order_obj);
        $billing_info         = $customer_obj->billing;
        $shipping_info        = $customer_obj->shipping;
        $single_customer_data = ['title' => 'Customers', 'customer' => $customer, 'shop' => $shop, 'billing_info' => $billing_info, 'shipping_info' => $shipping_info];
        return view('customer.single-customer', $single_customer_data);
    }

    /**
     * 
     * import customer by shopid
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function importCustomerByShopId($shop_id)
    {
        $recall = true;
        $shop   = Shop::find($shop_id);
        if(is_null($shop)){
            return redirect('customers')->with('error','Shop does not exit!');
        }

        $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
            'wp_api'  => true,
            'version' => 'wc/v3'
        ]);

        while ($recall) {
            $customers = $woocommerce->get('customers?per_page=3&page=' . $this->page);
            $recall    = $this->createDataArray($customers, $shop_id);
        }

        return redirect('customers')->with('success', $this->total_customer . ' Customers Imported successfully');
    }

    /**
     * 
     * get customer from web-hook and insert into the database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */
    public function getNewCustomerByShopIdFromWebHook(Request $request)
    {
        $customer = json_decode(file_get_contents('php://input'));

        $myfile = fopen("Customer_" . now() . ".txt", "w") or die("Unable to open file!");
        fwrite($myfile, file_get_contents('php://input'));
        fclose($myfile);

        $data = $this->makeArrOfCustomer($customer);
        return Customer::insert($data);
    }


    /**
     * 
     * make array of customer
     * 
     * @param Object of Customers
     * 
     * @return Array Of Customer
     * 
     */

    protected function makeArrOfCustomer($customer)
    {

        $shop_id  = '0';

        if (isset($customer->_links) && ($customer->_links->self) && ($customer->_links->self[0]) && ($customer->_links->self[0]->href)) {
            $shop    = parse_url($customer->_links->self[0]->href, PHP_URL_HOST);
            $shop    = Shop::where('shop_url', 'like', '%' . $shop . '%')->first();
            $shop_id = $shop->shop_id;
        }

        $data = [
            'original_customer_id' => $customer->id,
            'name'                 => $customer->first_name . ' ' . $customer->last_name,
            'email'                => $customer->email,
            'user_id'              => 1,
            'shop_id'              => $shop_id,
            'phone'                => $customer->billing->phone,
            'city'                 => $customer->billing->city,
            'country'              => $customer->billing->country,
            'order_created_at'     => $customer->date_created,
            'order_modified_at'    => $customer->date_modified,
            'order_obj'            => json_encode($customer),
            'created_at'           => now(),
            'updated_at'           => now()
        ];

        return $data;
    }

    /**
     * 
     * customer update by wocommerce hook || if no exist customer then insert
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function customerUpdateByHook($shop_id)
    {

        if (!Shop::find($shop_id)) {
            return false;
        }

        $update_customer = json_decode(file_get_contents('php://input'));
        $original_customer_id = $update_customer->id;
        $customer = Customer::where('original_customer_id', $original_customer_id)->first();
        if (!is_null($customer)) {

            $data = $this->makeArrOfCustomer($update_customer);
            return Customer::where('original_customer_id', $original_customer_id)->update($data);
        } else {

            $data = $this->makeArrOfCustomer($update_customer);
            return Customer::insert($data);
        }
    }

    /**
     * 
     * delete customer by web-hook
     * 
     * @param $shop_id
     * 
     * @return Boolean
     * 
     */

    public function customerDeleteByHook($shop_id)
    {

        $customer_original_id = json_decode(file_get_contents('php://input'));
        
        $customer = Customer::where('original_customer_id', $customer_original_id->id)->first();
        $customer->delete();
        return true;
    }


    private function createDataArray($customers, $shop_id)
    {

        $recall = false;
        $data   = [];
        foreach ($customers as $customer) {

            $data[] = [
                'original_customer_id' => $customer->id,
                'name'                 => $customer->first_name . ' ' . $customer->last_name,
                'email'                => $customer->email,
                'user_id'              => 1,
                //'user_id' => Auth::user()->id,
                'shop_id'              => $shop_id,
                'phone'                => $customer->billing->phone,
                'city'                 => $customer->billing->city,
                'country'              => $customer->billing->country,
                'order_created_at'     => $customer->date_created,
                'order_modified_at'    => $customer->date_modified,
                'order_obj'            => json_encode($customer)
            ];
        }


        Customer::insert($data);
        $this->page++;
        $this->total_customer += count($customers);
        if (count($customers) >= 3) {
            $recall = true;
        }
        return $recall;
    }
}
