<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopifyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\AuthController;

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
    return view('welcome');
});

// Route::get('/', [ShopifyController::class, 'index']);

// Route::get('/shopify/connect', [ShopifyController::class, 'redirectToShopify']);

/*Route::get('/vendor/login', [UserController::class, 'vendorLogin'])->name('vendor.login');
Route::get('/vendor/install_app', [DashboardController::class, 'installApp'])->name('vendor.install_app');
Route::get('/vendor/sync_products', [ProductController::class, 'syncProducs'])->name('vendor.sync_products');


Route::get('/create-webhook', [ShopifyController::class, 'createWebhook']);
Route::post('/webhook/orders/{store}', [ShopifyController::class, 'handleWebhook']);
*/
Route::get('/getorder', [OrderController::class, 'getOrder'])->name('getorder');

Route::get('/vendor/register', [AuthController::class, 'registerForm'])->name('vendor.register');
Route::post('/vendor/doregister', [AuthController::class, 'vendorDoRegister'])->name('vendor.doregister');
Route::get('/vendor/login', [AuthController::class, 'loginForm'])->name('vendor.login');
Route::post('/vendor/dologin', [AuthController::class, 'vendorDoLogin'])->name('vendor.dologin');
Route::get('/vendor/forgotpassword', [AuthController::class, 'forgotPasswordForm'])->name('vendor.forgotpassword');
Route::get('/vendor/verification', [AuthController::class, 'verificationForm'])->name('vendor.verification');
Route::get('/vendor/resetpassword', [AuthController::class, 'resetPasswordForm'])->name('vendor.resetpassword');

// Route::post('webhook/uninstalled888888888', 'WebhookController@handleUninstalled');
Route::post('webhook/order-create', [ShopifyController::class, 'handleOrderCreate']);

Route::middleware(['auth','preventBackHistory'])->group(function () {

    Route::get('shopify/install_app', [ShopifyController::class, 'installApp'])->name('vendor.install_app');
    Route::post('shopify/install', [ShopifyController::class, 'install'])->name('shopify.install');
    
    Route::get('/shopify/callback', [ShopifyController::class, 'callback'])->name('shopify.callback');
    // Route::get('callback', [ShopifyController::class, 'callback'])->name('shopify.callback');
    
    Route::get('/vendor/home', [DashboardController::class, 'index'])->name('vendor.home');
    Route::get('/vendor/dashboard', [DashboardController::class, 'dashboard'])->name('vendor.dashboard');
    Route::get('/vendor/list_products', [ProductController::class, 'getProducts'])->name('vendor.list_products');
    Route::get('/vendor/get_products_data', [ProductController::class, 'getProductsData'])->name('vendor.get_products_data');
    Route::post('/vendor/single_sync_product', [ProductController::class, 'singleSyncProduct'])->name('vendor.single_sync_product');
    Route::get('/vendor/profile', [UserController::class, 'vendorProfile'])->name('vendor.profile');
    Route::post('/user/profile/update', [UserController::class, 'vendorProfileUpdate'])->name('user.profile.update');
    Route::get('/vendor/orders', [OrderController::class, 'orderLists'])->name('vendor.orders');
    Route::get('/vendor/get_order_data', [OrderController::class, 'getOrderData'])->name('vendor.get_order_data');
    Route::post('/vendor/getOrderDetails', [OrderController::class, 'getOrderDetails'])->name('vendor.getOrderDetails');
    Route::get('/vendor/addTrackingNo', [OrderController::class, 'addTrackingNo'])->name('vendor.addTrackingNo');
    Route::get('/vendor/logout', [DashboardController::class, 'logout'])->name('vendor.logout');
});