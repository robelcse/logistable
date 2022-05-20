<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Coupon;
use Automattic\WooCommerce\Client;

class CouponController extends Controller
{

    private $url             = 'https://productforsell.com/';
    private $consumer_key    = 'ck_8716617dae507f8b48afde7278695e17520b8595';
    private $consumer_secret = 'cs_8422ecf12bc8bf4f45846dfa51869fa264a3b6a8';

    private $page           = 1;
    private $total_coupon = 0;

    /**
     * 
     * get list of coupon
     * 
     * @return array of coupon
     * 
     */
    public function index()
    {

        // $shop = Shop::find(5);
        // $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
        //     'wp_api' => true,
        //     'version' => 'wc/v3'
        // ]);
        // $coupons = $woocommerce->get('coupons');

        $coupons = Coupon::with('shop')->orderBy('coupon_id','desc')->get();
        return view('cupon.cupons', ['title' => 'Cupons', 'coupons' => $coupons]);
    }

    /**
     * 
     * show coupon by id
     * 
     * @param int $id
     * 
     * @return Object of coupon
     * 
     */

    public function show($id)
    {
        $coupon = Coupon::find($id);
        return view(
            'cupon.single-cupon',
            [
                'title'  => 'Cupon Details',
                'coupon' => $coupon
            ]
        );
    }

    /**
     * 
     * import coupons by shopid
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function importCouponByShopId($shop_id)
    {
        
        $recall = true;
        $shop = Shop::find($shop_id);
        if(is_null($shop)){
            return redirect('coupons')->with('error','Shop does not exit!');
        }

        $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
            'wp_api' => true,
            'version' => 'wc/v3'
        ]);

        while ($recall) {
            $coupons = $woocommerce->get('coupons?per_page=3&page=' . $this->page);
            $recall = $this->createDataArray($coupons, $shop_id);
        }

        // return response()->json([

        //     'status'  =>  'success',
        //     'status_code' =>  200,
        //     'message' =>  $this->total_coupon . ' coupon imported successfully'
        // ]);

        return redirect('coupons')->with('success', $this->total_coupon . ' Coupons imported successfully');
    }

    /**
     * 
     * get coupon from hook and insert into the database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */

    public function getNewCouponByShopIdFromWebHook(Request $request)
    {

        // $myfile = fopen("Coupon_" . now() . ".txt", "w") or die("Unable to open file!");
        // fwrite($myfile, file_get_contents('php://input'));
        // fclose($myfile);

        $coupon  = json_decode(file_get_contents('php://input'));

        $data = $this->makeArrOfCoupon($coupon);
        return Coupon::insert($data);
    }


    /**
     * 
     * make array of coupon
     * 
     * @param Object of Coupon
     * 
     * @return array of Coupon
     * 
     */


    protected function makeArrOfCoupon($coupon)
    {

        $shop_id = '0';
        if (isset($coupon->_links) && ($coupon->_links->self) && ($coupon->_links->self[0]) && ($coupon->_links->self[0]->href)) {
            $shop    = parse_url($coupon->_links->self[0]->href, PHP_URL_HOST);
            $shop    = Shop::where('shop_url', 'like', '%' . $shop . '%')->first();
            $shop_id = $shop->shop_id;
        }

        $data = [
            'original_coupon_id' => $coupon->id,
            'user_id'            => 1,
            'code'               => $coupon->code,
            'amount'             => $coupon->amount,
            'shop_id'            => $shop_id,
            'discount_type'      => $coupon->discount_type,
            'description'        => $coupon->description,
            'product_ids'        => json_encode($coupon->product_ids),
            'date_expires'       => $coupon->date_expires,
            'date_created'       => $coupon->date_created,
            'date_created'       => $coupon->date_created,
            'coupon_obj'         => json_encode($coupon),
            'created_at'         => now(),
            'updated_at'         => now()
        ];
        return $data;
    }

    /**
     * 
     * update coupons by webhook || if no exist coupons then insert
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    protected function couponsUpdateByHook($shop_id)
    {

        $update_coupon  = json_decode(file_get_contents('php://input')); 
        $coupon = Coupon::where('original_coupon_id', $update_coupon->id)->first();
        if(!is_null($coupon))
        {
            $data = $this->makeArrOfCoupon($update_coupon); 
            return Coupon::where('original_coupon_id', $update_coupon->id)->update($data);

        }else{

            $data = $this->makeArrOfCoupon($update_coupon); 
            return Coupon::insert($data);
        } 
     
    }

    /**
     * 
     * coupons update by web-hook
     * 
     * @param $shop_id
     * 
     * @return Boolean
     * 
     */
    
     public function couponDeleteByHook($shop_id)
     {
        $coupon_original_id = json_decode(file_get_contents('php://input'));

        $coupon = Coupon::where('original_coupon_id',$coupon_original_id->id)->first();
        $coupon->delete();
        return true;
     }

    private function createDataArray($coupons, $shop_id)
    {

        $recall = false;
        $data   = [];
        foreach ($coupons as $coupon) {
             
            $data[]     = [
                'original_coupon_id' => $coupon->id,
                'user_id'            => 1,
                'code'               => $coupon->code,
                'amount'             => $coupon->amount,
                'shop_id'            => $shop_id,
                'discount_type'      => $coupon->discount_type,
                'description'        => $coupon->description,
                'product_ids'        => json_encode($coupon->product_ids),
                'date_expires'       => $coupon->date_expires,
                'date_created'       => $coupon->date_created,
                'date_created'       => $coupon->date_created,
                'coupon_obj'         => json_encode($coupon),
                'created_at'         => now(),
                'updated_at'         => now()
            ];

            Coupon::insert($data);
        }
        $this->page++;
        $this->total_coupon += count($coupons);
        if (count($coupons) >= 3) {
            $recall = true;
        }
        return $recall;
    }
}
