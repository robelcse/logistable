<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//product import api
Route::get('/products/{shop_id}/import', [ProductController::class, 'importByShopId'])->name('importByShopId');
//order import api
Route::get('/orders/{shop_id}/import', [OrderController::class, 'importOrderByShopId'])->name('importOrderByShopId');

//get all order api
Route::get('/orders', function(){

    $orders = Order::with('shop')->orderBy('order_id','desc')->paginate(15);
});

Route::get('/users/{key}', [OrderController::class, 'getUsers'])->name('getUsers');