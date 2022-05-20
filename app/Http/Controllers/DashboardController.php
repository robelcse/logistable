<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Shop;
use App\Models\Order;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_shop = Shop::all()->count();
        $total_product  = Product::all()->count();
        $total_order = Order::all()->count();
        $total_customer  = Customer::all()->count();
        $recent_orders = Order::orderBy('order_id', 'desc')->latest()->take(5)->get(); 

       return view('dashboard', ['title' => 'Dashboard', 'total_shop' => $total_shop, 'total_product' => $total_product, 'total_order' => $total_order, 'recent_orders' => $recent_orders, 'total_customer' => $total_customer]);
    }

}
