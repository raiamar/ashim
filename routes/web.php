<?php

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

Route::get('dashborad', 'MainController@dashborad');
Route::get('/', 'homeController@index');
Route::get('/about','homeController@about')->name('about');
Route::get('/menu','homeController@menu')->name('menu');
Route::post('/booking','BookingController@booking')->name('booking');
Route::get('/specialities','BookingController@specialities')->name('specialities');
Route::get('/contact','homeController@contact')->name('contact');
Route::post('submit-inquery','homeController@SubmitInquery')->name('submit.inquiry');




//cart controller
Route::get('carts', 'CartController@CartProducts')->name('carts');
Route::get('add-to-cart/{id}', 'CartController@addTocart')->name('add.to.cart');
Route::get('updateCart', 'CartController@updateCart')->name('update.cart');
Route::any('remove-from-cart/{id}', 'CartController@remove_from_cart')->name('remove.from.cart');
Route::get('checkout', 'CartController@CheckoutProducts')->name('checkout')->middleware('auth');
Route::post('checkout', 'CartController@PlaceOrderProducts')->name('place.order');


//esewa Payment
Route::any('success', 'CartController@ESuccess')->name('esewa.success');
Route::any('fail', 'CartController@EFail')->name('esewa.fail');
Route::get('payment-response', 'CartController@payment_response')->name('home.delevery');

// ->middleware('verified')
Auth::routes(['verify' => true]);
Route::any('logout-user', ['as' => 'logout-user', 'uses' => 'Auth\LoginController@logout']);

