<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CouponController;

// cupon route start
Route::middleware('auth')->get('/coupons', [CouponController::class, 'index'])->name('coupons');
Route::middleware('auth')->get('/coupons/{id}', [CouponController::class, 'show'])->name('coupon');
Route::middleware('auth')->get('/coupons/{shop_id}/import', [CouponController::class, 'importCouponByShopId'])->name('importCouponByShopId');

Route::post('/coupons/{shop_id}/new',  [CouponController::class, 'getNewCouponByShopIdFromWebHook'])->name('getNewCouponByShopIdFromWebHook');
Route::post('/coupons/{shop_id}/update-by-hook',  [CouponController::class, 'couponsUpdateByHook'])->name('coupons_update_by_hook');
Route::post('/coupons/{shop_id}/delete-by-hook',[CouponController::class,'couponDeleteByHook'])->name('coupons_delete_by_hook');
