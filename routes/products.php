<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImportController;

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Products Routes
    |--------------------------------------------------------------------------
    |
    | Import product by queue
    | ::get('products/shop_id/import')
    | products/shop_id/insert [temporary]
    | Show product list
    | ::get('/products')
    | Show single product
    | ::get('/products/id')
    | Update product by woocommerce hook
    | ::post('products/id/update-by-hook')
    | Delete product by wocommerce hook
    | ::post('/products/{shop_id}/delete-by-hook')
    |
    */

    Route::get('/products/{shop_id}/import', [ProductController::class, 'importByShopId'])->name('importByShopId');

    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product');
    Route::get('/import-product', [ImportController::class, 'importProduct'])->name('importProduct');



});


Route::post('/products/{shop_id}/new', [ProductController::class, 'getNewProductByShopIdFromWebHook'])->name('getNewProductByShopIdFromWebHook');
Route::post('/products/{shop_id}/update-by-hook',[ProductController::class,'productUpdateByHook'])->name('product_update_by_hook');
Route::post('/products/{shop_id}/delete-by-hook',[ProductController::class,'productDeleteByHook'])->name('product_delete_by_hook');

 



