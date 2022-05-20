<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Product;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
    private $url = 'https://productforsell.com/';
    private $consumer_key = 'ck_8716617dae507f8b48afde7278695e17520b8595';
    private $consumer_secret = 'cs_8422ecf12bc8bf4f45846dfa51869fa264a3b6a8';
    private $page = 1;
    private $product_counter = 0;


    /**
     * 
     * get list of product
     * 
     * @return array of product
     * 
     */

    public function index()
    {
        //$woocommerce = new Client($this->url, $this->consumer_key, $this->consumer_secret);
        //$products = $woocommerce->get('products');

        $products = Product::with('shop')->orderBy('product_id', 'desc')->paginate(12);
        return view('product.products', ['title' => 'Products', 'products' => $products]);
    }

    /**
     * 
     * show product by id
     * 
     * @param int $id
     * 
     * @return object of product
     * 
     */

    public function show($id)
    {
        // $woocommerce = new Client($this->url, $this->consumer_key, $this->consumer_secret);
        // return $product = $woocommerce->get('products/'.$id);
        $product = Product::with('shop')->findOrFail($id);
        $shop = $product['shop'];
        $product = json_decode($product->product_obj);
        return view('product.product', ['title' => 'Product', 'product' => $product, 'shop' => $shop]);
    }

    /**
     * 
     * get new product from web-hook and insert into the database
     * 
     * @param \Illuminate\Http\Request $request
     * 
     * @return Boolean
     * 
     */

    public function getNewProductByShopIdFromWebHook(Request $request)
    {
        $product = json_decode(file_get_contents('php://input'));
        $shop_id = '0';
        if (isset($product->_links) && ($product->_links->self) && ($product->_links->self[0]) && ($product->_links->self[0]->href)) {
            $shop = parse_url($product->_links->self[0]->href, PHP_URL_HOST);
            $shop = Shop::where('shop_url', 'like', '%' . $shop . '%')->first();
            $shop_id = $shop->shop_id;
        }

        $data = $this->makeArrOfProduct($shop_id, $product);
        return Product::insert($data);
    }


    /**
     * 
     * make array of product
     * 
     * @param Object of product
     * 
     * @return Array of product
     * 
     */

    protected function makeArrOfProduct($shop_id, $product)
    {
        $data = [
            'original_id' => $product->id,
            // ,'user_id' => Auth::user()->id
            'user_id' => 1,
            'shop_id' => $shop_id,
            'name' => $product->name,
            'permalink' => $product->permalink,
            'picture' => count($product->images) > 0 ? $product->images[0]->src : null,
            'type' => $product->type,
            'status' => $product->status,
            'sku' => $product->sku,
            'quantity' => $product->stock_quantity ? $product->stock_quantity : 0,
            'price' => $product->price,
            'product_obj' => json_encode($product),
            'created_at' => now(),
            'updated_at' => now()
        ];

        return $data;
    }

    /**
     * 
     *  product update by wocommerce hook || if no exist product then insert
     * 
     * @param int $shop_id
     * 
     * @return Boolean
     * 
     */

    public function productUpdateByHook($shop_id)
    {

        if (!Shop::find($shop_id)) {
            return false;
        }

        $update_product = json_decode(file_get_contents('php://input'));

        $product_original_id =  $update_product->id;
        $product = Product::where('original_id', $product_original_id)->first();
        if (!is_null($product)) {

            $data = $this->makeArrOfProduct($shop_id, $update_product);
            return Product::where('original_id', $product_original_id)->update($data);
        } else {

            $data = $this->makeArrOfProduct($shop_id, $update_product);
            return Product::insert($data);
        }
    }


    /**
     * 
     * product delete by web-hook
     * 
     * @param $shop_id
     * 
     * @return Boolean
     * 
     */

    public function productDeleteByHook($shop_id)
    {

        $product_original_id = json_decode(file_get_contents('php://input'));

        $product = Product::where('original_id', $product_original_id->id)->first();
        $product->delete();
        return true;
    }

    /**
     * 
     * import product by shop id
     * 
     * @param $shop_id
     * 
     * @return Boolean
     * 
     * 
     */

    public function importByShopId($shop_id)
    {

        $recall = true;
        $shop = Shop::find($shop_id);

        if (is_null($shop)) {
            return redirect('products')->with('error', 'Shop does not exit!');
        }

        $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
            'wp_api' => true,
            'version' => 'wc/v3'
        ]);

        while ($recall) {
            $products = $woocommerce->get('products?per_page=3&page=' . $this->page);
            $recall = $this->createDataArray($products, $shop_id);
        }
        return redirect('products')->with('success', $this->product_counter . ' Products imported successfully');
    }


    private function createDataArray($products, $shop_id)
    {
        $recall = false;
        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'original_id' => $product->id,
                // ,'user_id' => Auth::user()->id
                'user_id' => 1,
                'shop_id' => $shop_id,
                'name' => $product->name,
                'permalink' => $product->permalink,
                'picture' => count($product->images) > 0 ? $product->images[0]->src : null,
                'type' => $product->type,
                'status' => $product->status,
                'sku' => $product->sku,
                'quantity' => $product->stock_quantity ? $product->stock_quantity : 0,
                'price' => $product->price,
                'product_obj' => json_encode($product)
            ];
        }

        Product::insert($data);
        $this->page++;
        $this->product_counter += count($products);
        if (count($products) >= 3) {
            $recall = true;
        }
        return $recall;
    }
}
