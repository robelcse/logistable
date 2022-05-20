<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function integrations(){
        return view('config.integrations',['title' => 'Shop Integration']);
    }

    public function createWebShop($platform){
        return view('config/integrations/connect',['title' => $platform, 'platform' => $platform]);
    }

    public function storeWebShop(Request $request){

        $request->validate([
            'shop_name'         => 'required|unique:shops|max:55',
            'consumer_key'      => 'required|max:255',
            'consumer_secret'   => 'required|max:255',
            'shop_url'          => 'required|unique:shops|max:255',
            'shop_type'         => 'required|max:255',
        ]);

        $config                  = new Shop();
        $config->user_id         = Auth::user()->id;
        $config->shop_name       = $request->shop_name;
        $config->shop_url        = $request->shop_url;
        $config->shop_type       = $request->shop_type;
        $config->consumer_key    = $request->consumer_key;
        $config->consumer_secret = $request->consumer_secret;
        $config->validate_ssl    = $request->ssl_validation;
        $saved                   = $config->save();
        if($saved){
            return redirect('web-shop')->with('success', 'Webshop creation success!'); 
        }else{
            return back()->with('warning', 'Please try it again!');
        }
    }

}