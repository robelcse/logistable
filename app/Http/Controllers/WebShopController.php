<?php

namespace App\Http\Controllers;

 
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebShopController extends Controller
{
    public function index(){
        $shops = Shop::where('user_id', Auth::user()->id)->get();

        return view('web-shop.index',['title' => 'webshops', 'shops' => $shops]);
    }

    public function shopSummery($id){

        $shop = Shop::find($id);
        return view('web-shop.single-shop',['title' => 'webshops Details', 'shop' => $shop]);
    }
}
