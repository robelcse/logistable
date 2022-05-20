<?php

namespace App\Jobs;

use App\Models\Shop;
use App\Models\Order;
use Automattic\WooCommerce\Client;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Http;


class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $shop_id;
    private $page = 1;
    private $total_order = 0;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shop_id)
    {
        $this->shop_id = $shop_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */





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

    public function handle()
    {

        return response()->json([
            'status'=>'success',
            'status_code'=>200,
            'message'=>'order created successfully.'
        ]);

        // $recall = true;
        // $shop = Shop::find($this->shop_id);

        // $woocommerce = new Client($shop->shop_url, $shop->consumer_key, $shop->consumer_secret, [
        //     'wp_api' => true,
        //     'version' => 'wc/v3'
        // ]);

        // while ($recall) {
        //     $orders = $woocommerce->get('orders?per_page=3&page=' . $this->page);
        //     $recall = $this->createDataArray($orders, $this->shop_id);
        // }
    }

    public function getResponse()
    {
        return "success";
    }
}
