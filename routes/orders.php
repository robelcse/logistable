<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShipingController;

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Orders Routes
    |--------------------------------------------------------------------------
    | Show order list
    | ::get('/orders')
    | Import order by queue
    | ::get('/orders/shop_id/import')
    | New order by webhook
    | ::get('orders/shop_id/new') 
    | Show single order
    | ::get('orders/id')
    | Update order by woocommerce hook
    | ::post('orders/order_id/update-by-hook')
    | Delete Order by wocommerce hook
    | ::post('/orders/{shop_id}/delete-by-hook')
    |
    */
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{shop_id}/import', [OrderController::class, 'importOrderByShopId'])->name('importOrderByShopId');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order');

    // shipin route start
    Route::get('/shipings', [ShipingController::class, 'index'])->name('shipings');
    Route::get('/shipings/{id}', [ShipingController::class, 'show'])->name('shiping');
});

Route::post('/orders/{shop_id}/new', [OrderController::class, 'getNewOrderByShopIdFromWebHook'])->name('getNewOrderByShopIdFromWebHook');
Route::post('/orders/{shop_id}/update-by-hook', [OrderController::class, 'orderUpdateByHook'])->name('order_update_by_hook');
Route::post('/orders/{shop_id}/delete-by-hook',[OrderController::class,'orderDeleteByHook'])->name('order_delete_by_hook');
