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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::resource('/', 'WebController');
Route::get('products', 'ProductController@index')->name('products');
Route::get('products/detail/{id?}', 'ProductController@show')->name('product-detail');
Route::prefix('admin')->middleware(['auth', 'can:isAdmin'])->group(function () {
	Route::resource('/', 'AdminController');
	Route::resource('/product', 'ProductController');
	Route::get('/', 'AdminController@index')->name('admin');
	Route::post('/user/edit/{id}', 'UserController@update')->name('user.update');
	Route::get('/user/edit/{id}', 'UserController@show')->name('user.edit');
	Route::get('/users', 'UserController@list')->name('users-list');
	Route::get('products', 'ProductController@list')->name('products-list');
});
Route::prefix('employee')->middleware('auth')->group(function () {
    Route::resource('/', 'EmployeeController');
    Route::get('/', 'EmployeeController@index')->name('employee');
});
Auth::routes();
Route::post('addToCart/{id?}', 'CartController@addToCart')->name('addToCart');
Route::get('cart', 'CartController@getItems')->name('cart');
Route::get('removeItem/{id?}', 'CartController@removeItem')->name('removeItem');
Route::get('checkout', 'CartController@checkout')->name('checkout');
Route::post('checkout', 'CartController@place_order')->name('place_order');
Route::get('test', 'CartController@test');
Route::get('/order/track', 'OrderController@track')->name('track');
Route::middleware(['auth'])->get('/order/list', 'OrderController@list')->name('orders-list');
Route::get('/order/edit/{id}', 'OrderController@list')->name('order-edit');
//Route::get('/home', 'HomeController@index')->name('home');