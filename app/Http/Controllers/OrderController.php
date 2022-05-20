<?php

namespace App\Http\Controllers;


use Mail;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    private $page = 1;
    private $total_order = 0;

    /**
     * 
     * get list of order
     * 
     * @return array of order
     * 
     */
    public function index()
    {
        $orders = Order::with('shop')->orderBy('order_id','desc')->paginate(15);
        return view('order.orders', ['title' => 'orders', 'orders' => $orders]);
    }

    /**
     * 
     * show order by id
     * 
     * @param int $order_id
     * 
     * @return Object of order
     * 
     */

    public function show($order_id)
    {
        $order_datails = Order::find($order_id);
        return view('order.order-details', ['title' => 'orders Details', 'order_datails' => $order_datails]);

        if (!is_null($order_datails)) {
            return view('order.order-details', ['order_datails' => $order_datails]);
        } else {

            return view('404');
        }
    }


    /**
     * 
     * import order by-shopid
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function importOrderByShopId($shop_id)
    {
        $recall = true;
        $shop = Shop::find($shop_id);

        if(is_null($shop)){
            return redirect('orders')->with('error','Shop does not exit!');
        }

        $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
            'wp_api' => true,
            'version' => 'wc/v3'
        ]);

        while ($recall) {
            $orders = $woocommerce->get('orders?per_page=3&page=' . $this->page);
            $recall = $this->createDataArray($orders, $shop_id);
        }

        return response()->json([

            'status'=>'success',
            'status_code'=>200,
            'message'=>$this->total_order.' Order Imported Successfully'
              
        ]);

        // return redirect('orders')->with('success', $this->total_order . ' Orders Imported successfully'); 
    }

    private function createDataArray($orders, $shop_id)
    {
        $recall = false;
        $data = [];
        foreach ($orders as $order) {
            $ids = '';
            $names = '';
            foreach ($order->line_items as $product) {
                $ids .= $product->product_id . ',';
                $names .= $product->name . ',';
            }
            $data[] = [
                'original_order_id' => $order->id,
                'original_product_ids' => $ids
                // , 'user_id' => Auth::user()->id
                , 'user_id' => 1,
                'shop_id' => $shop_id,
                'customer_name' => $order->billing->first_name . " " . $order->billing->last_name,
                'product_name' => $names,
                'status' => $order->status,
                'total' => $order->total,
                'order_created_at' => $order->date_created,
                'order_modified_at' => $order->date_modified,
                'order_obj' => json_encode($order)
            ];
        }

        Order::insert($data);
        $this->page++;
        $this->total_order += count($orders);
        if (count($orders) >= 3) {
            $recall = true;
        }
        return $recall;
    }

    /**
     * 
     * get order from web-hook and insert into the database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */

    public function getNewOrderByShopIdFromWebHook(Request $request)
    {
        
        $order = json_decode(file_get_contents('php://input'));

        // $myfile = fopen("Order_" . now() . ".txt", "w") or die("Unable to open file!");
        // fwrite($myfile, file_get_contents('php://input'));
        // fclose($myfile);

        $data = $this->makeArrOfOrder($order);
        return Order::insert($data);
    }

    /**
     * 
     * make array of order
     * 
     * @param Object of Order
     * 
     * @return array of order
     * 
     */

    protected function makeArrOfOrder($order)
    {

        $shop_id = '0';
        if (isset($order->_links) && ($order->_links->self) && ($order->_links->self[0]) && ($order->_links->self[0]->href)) {
            $shop = parse_url($order->_links->self[0]->href, PHP_URL_HOST);
            $shop = Shop::where('shop_url', 'like', '%' . $shop . '%')->first();
            $shop_id = $shop->shop_id;
        }

        $ids = '';
        $names = '';
        foreach ($order->line_items as $product) {
            $ids .= $product->product_id . ',';
            $names .= $product->name . ',';
        }

        $data = [
            'original_order_id' => $order->id,
            'original_product_ids' => $ids,
            'user_id' => 1,
            'shop_id' => $shop_id,
            'customer_name' => $order->billing->first_name . " " . $order->billing->last_name,
            'product_name' => $names,
            'status' => $order->status,
            'total' => $order->total,
            'order_created_at' => $order->date_created,
            'order_modified_at' => $order->date_modified,
            'order_obj' => json_encode($order),
            'created_at' => now(),
            'updated_at' => now()
        ];

        return $data;
    }


    /**
     * 
     * order update by wocommerce hook || if no exist order then insert
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function orderUpdateByHook($shop_id)
    {

        if (!Shop::find($shop_id)) {
            return false;
        }

        $update_order = json_decode(file_get_contents('php://input'));
        $original_order_id = $update_order->id;
        $order = Order::where('original_order_id', $original_order_id)->first();
        if (!is_null($order)) {

            $data = $this->makeArrOfOrder($update_order);
            return Order::where('original_order_id', $original_order_id)->update($data);
        } else {

            $data = $this->makeArrOfOrder($update_order);
            return Order::insert($data);
        }
    }


    /**
     * 
     * order delete by web-hook
     * 
     * @param $shop_id
     * 
     * @return Boolean
     * 
     */

    public function orderDeleteByHook($shop_id)
    {
        $order_original_id = json_decode(file_get_contents('php://input'));

        $order = Order::where('original_order_id',$order_original_id->id)->first();
        $order->delete();
        return true;
    }

    public function getUsers($key)
    {
        $users = Customer::orderBy('customer_id');
        if (!empty($query)) {
            $users->Where('email', 'like', '%' . $query . '%');
        }
        $users = $users->get();
        return $users->toJson();
    }
}
