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

Route::get('/', 'IndexController@index');

Route::get('/orders', 'OrdersController@index');
Route::resource('/orders', 'OrdersController');

Route::get('/kitchen', 'KitchenController@index');
Route::resource('/kitchen', 'KitchenController');

Route::get('/products', 'ProductsController@index');
Route::resource('/products', 'ProductsController');

Route::resource('/order_product', 'OrderProductController');