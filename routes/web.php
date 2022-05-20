<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\WebShopController;
use App\Http\Controllers\FrontendController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

// Route::get('/orders/{shop_id}/new', [OrderController::class, 'getNewOrderByShopIdFromWebHook'])->name('getNewOrderByShopIdFromWebHook');
Route::get('sample', [FrontendController::class, 'sample']);


Route::middleware(['auth'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/config', [ConfigController::class, 'integrations'])->name('integrations');
    Route::get('/config/integrations', [ConfigController::class, 'integrations'])->name('integrations');

    Route::get('/config/integrations/connect', [ConfigController::class, 'integrations'])->name('integrations');
    Route::get('/config/integrations/connect/{platform}', [ConfigController::class, 'createWebShop'])->name('createwebshop');
    Route::post('/config/integrations/connect/{platform}', [ConfigController::class, 'storeWebShop'])->name('storewebshop');

    Route::get('/web-shop', [WebShopController::class, 'index'])->name('webShops');
    Route::get('/web-shop/{id}', [WebShopController::class, 'shopSummery'])->name('shopSummery');



});



require __DIR__ . '/products.php';
require __DIR__ . '/customers.php';
require __DIR__ . '/orders.php';
require __DIR__ . '/webhooks.php';
require __DIR__ . '/coupons.php';
require __DIR__ . '/auth.php';
