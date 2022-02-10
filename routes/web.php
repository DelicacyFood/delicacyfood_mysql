<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderlistController;
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

// Blank Page
Route::get('/', 'App\Http\Controllers\MainController@index')->name('start');
Route::get('/menu', 'App\Http\Controllers\MainController@menu')->name('menu');


// Modules Page
Route::get('/modules/sweet-alert', 'App\Http\Controllers\MainController@sweetalert')->name('sweetalert');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Pages
Route::get('/pages/blank', 'App\Http\Controllers\MainController@home')->name('home');
Route::get('/pages/dashboard', 'App\Http\Controllers\MainController@dashboard')->name('dashboard');
Route::get('/pages/orderlist', 'App\Http\Controllers\MainController@orderlist')->name('orderlist');
Route::get('/pages/faq', 'App\Http\Controllers\MainController@faq')->name('faq');
Route::get('/pages/credits', 'App\Http\Controllers\MainController@credits')->name('credits');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Top up
Route::get('/pages/topup', 'App\Http\Controllers\CustomerController@topup')->name('topup');
Route::post('/pages/topup', 'App\Http\Controllers\CustomerController@isi_saldo')->name('topup.custom');
Route::get('/pages/history_topup', 'App\Http\Controllers\CustomerController@history_topup')->name('history_topup');
Route::post('/pages/history_topup/{saldo}/{topup_id}/{customer_user_id}', 'App\Http\Controllers\CustomerController@store_saldo')->name('store_saldo');



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Ordermenu
Route::get('/pages/ordermenu', 'App\Http\Controllers\OrdermenuController@getCart')->name('ordermenu');
// Route::post('/pages/ordermenu/{menu_id}', 'App\Http\Controllers\OrdermenuController@cancelOrdermenu')->name('cancelOrdermenu');
Route::post('/pages/ordermenu/{menu_id}', 'App\Http\Controllers\OrdermenuController@deleteOrdermenu')->name('deleteOrdermenu');
Route::get('/pages/jumlah_order/{menu_id}', 'App\Http\Controllers\OrdermenuController@jumlah_order')->name('jumlah_order');
Route::post('/pages/jumlah_order/{menu_id}', 'App\Http\Controllers\OrdermenuController@save_jumlah_order')->name('jumlah_order.custom');

// Invoice Page
Route::get('/pages/invoice', 'App\Http\Controllers\OrdermenuController@invoice')->name('invoice');
Route::post('/pages/invoice/{totalPrice}', 'App\Http\Controllers\OrdermenuController@confirmPaymentCustomer')->name('confirmPaymentCustomer');
Route::get('/pages/invoice/invoice_csv_download', 'App\Http\Controllers\OrdermenuController@invoice_csv_download')->name('invoice_csv_download');

// Sales Record
Route::get('/pages/sales_record', 'App\Http\Controllers\OrdermenuController@sales_record')->name('sales_record');
Route::get('/pages/sales_record/detail/{orderlist_id}', 'App\Http\Controllers\OrdermenuController@detail_sales_record')->name('detail_sales_record');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Orderlist
Route::get('/pages/orderlist', 'App\Http\Controllers\OrderlistController@orderlist')->name('orderlist');
Route::post('/pages/orderlist', 'App\Http\Controllers\OrderlistController@confirmOrder')->name('confirmOrder');
Route::post('/pages/orderlist/delete/{orderlist_id}', 'App\Http\Controllers\OrderlistController@deleteOrderlist')->name('deleteOrderlist');
Route::get('/pages/orderlist/detail/{orderlist_id}', [OrderlistController::class, 'detailOrderlist'])->name('detailOrderlist');
Route::post('/pages/orderlist/detail/confirmpayment/{orderlist_id}', [OrderlistController::class, 'confirmPayment'])->name('confirmPayment');
// Orderlist Manager
Route::get('/pages/orderlist_manager', 'App\Http\Controllers\OrderlistController@orderlist_manager')->name('orderlist_manager');
Route::get('/pages/orderlist_manager/detail/{orderlist_id}', [OrderlistController::class, 'detailOrderlist_manager'])->name('detailOrderlist_manager');


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Auth
Route::post('/auth/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
Route::get('/auth/update_password', 'App\Http\Controllers\AuthController@update_password')->name('update_password');
Route::get('/auth/profile', 'App\Http\Controllers\AuthController@profile')->name('profile');
Route::post('/auth/edit_profile', 'App\Http\Controllers\AuthController@edit_profile')->name('edit_profile');

// Register dan Login Customer
Route::get('/auth/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('/auth/store', 'App\Http\Controllers\AuthController@store')->name('register.store');
Route::get('/auth/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/auth/login', 'App\Http\Controllers\AuthController@authenticate')->name('login.custom');

// Register dan Login Waiter
Route::get('/auth/register_waiter', 'App\Http\Controllers\AuthController@register_waiter')->name('register.waiter');
Route::post('/auth/store_waiter', 'App\Http\Controllers\AuthController@store_waiter')->name('register.store.waiter');
Route::get('/auth/login_waiter', 'App\Http\Controllers\AuthController@login_waiter')->name('login.waiter');
Route::post('/auth/login_waiter', 'App\Http\Controllers\AuthController@authenticate_waiter')->name('login.custom.waiter');

// Register dan Login Manager
Route::get('/auth/register_manager', 'App\Http\Controllers\AuthController@register_manager')->name('register.manager');
Route::post('/auth/store_manager', 'App\Http\Controllers\AuthController@store_manager')->name('register.store.manager');
Route::get('/auth/login_manager', 'App\Http\Controllers\AuthController@login_manager')->name('login.manager');
Route::post('/auth/login_manager', 'App\Http\Controllers\AuthController@authenticate_manager')->name('login.custom.manager');


// Register dan Login Driver
Route::get('/auth/register_driver', 'App\Http\Controllers\AuthController@register_driver')->name('register.driver');
Route::post('/auth/store_driver', 'App\Http\Controllers\AuthController@store_driver')->name('register.store.driver');
Route::get('/auth/login_driver', 'App\Http\Controllers\AuthController@login_driver')->name('login.driver');
Route::post('/auth/login_driver', 'App\Http\Controllers\AuthController@authenticate_driver')->name('login.custom.driver');


// Driver Page
Route::get('/pages/driver_page', 'App\Http\Controllers\DriverController@driver_page')->name('driver_page');
Route::get('/pages/driver/detail/{orderlist_id}', 'App\Http\Controllers\DriverController@detailDriver')->name('detailDriver');
Route::post('/pages/driver/detail/delivery_confirm/{orderlist_id}', 'App\Http\Controllers\DriverController@deliveryConfirm')->name('deliveryConfirm');
