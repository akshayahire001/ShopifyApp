<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyController;
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

// Route::get('/install', 'ShopifyController@redirectToShopify');
// Route::get('/shopify/callback', 'ShopifyController@handleCallback')->name('shopify.callback');

Route::get('/install', [ShopifyController::class, 'redirectToShopify']);
Route::get('/shopify/callback', [ShopifyController::class, 'handleCallback'])->name('shopify.callback');