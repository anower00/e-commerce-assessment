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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/productSupplier', 'ProductSupplierController');
Route::get('ProductSupplier/orderList', 'ProductSupplierController@orderList')->name('product.orderList');
Route::post('ProductSupplier/delivery/{id}', 'ProductSupplierController@orderDelivery')->name('product.orderDelivery');

Route::get('/company', 'CompanyController@company')->name('company');
Route::get('company/supplierProduct', 'CompanyController@supplierProduct')->name('supplier.product');
Route::get('company/supplierProduct/createOrder/{id}', 'CompanyController@createOrder')->name('product.createOrder');
Route::post('company/supplierProduct/orderStore', 'CompanyController@orderStore')->name('product.orderStore');
