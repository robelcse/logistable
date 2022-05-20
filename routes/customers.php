<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | customers Routes
    |--------------------------------------------------------------------------
    |
    | Import customer by queue
    | ::get('/customers/shop_id/import')
    | customers/shop_id/new [new-order-by-webhook]
    | Show customer list
    | ::get('/customers')
    | Show single customer
    | ::get('/customers/id')
    | Update customer by woocommerce hook
    | ::post('/customers/id/update-by-hook')
    | Delete customer by wocommerce hook
    | ::post('/customers/{shop_id}/delete-by-hook')
    |
    */

    Route::get('/customers/{shop_id}/import', [CustomerController::class, 'importCustomerByShopId'])->name('importCustomerByShopId');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customer');
   

});

Route::post('/customers/{shop_id}/new', [CustomerController::class, 'getNewCustomerByShopIdFromWebHook'])->name('getNewCustomerByShopIdFromWebHook');
Route::post('/customers/{shop_id}/update-by-hook',[CustomerController::class, 'customerUpdateByHook'])->name('customer_update_by_hook');
Route::post('/customers/{shop_id}/delete-by-hook',[CustomerController::class,'customerDeleteByHook'])->name('customer_delete_by_hook');
    

