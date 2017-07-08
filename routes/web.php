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


Route::get('/get_packages', 'HomeController@get_packages');
Route::get('/get_items_supplier', 'HomeController@get_items_supplier');
Route::get('/get_item_packages_item', 'HomeController@get_item_packages_item');
Route::post('/payment_bill', 'HomeController@payment_bill');
Route::post('/payment_invoice', 'HomeController@payment_invoice');
Route::get('/get_item_bill_bill', 'HomeController@get_item_bill_bill');
Route::get('/get_item_price', 'HomeController@get_item_price');
Route::get('/get_item_price_item', 'HomeController@get_item_price_item');
Route::get('/get_item_invoice_invoice', 'HomeController@get_item_invoice_invoice');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group( ['middleware' => ['auth']], function() {
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('posts', 'PostController');
    Route::resource('suppliers', 'SupplierController');
    Route::resource('item_categories', 'Item_categorieController');
    Route::resource('item_attributes', 'Item_attributeController');
    Route::resource('items', 'ItemController');
    Route::resource('customers', 'CustomerController');
    Route::resource('item_packages', 'Item_packageController');
    Route::resource('expense_categories', 'Expense_categorieController');
    Route::resource('expenses', 'ExpenseController');
    Route::resource('bills', 'BillController');
    // Route::get('purchase', 'BillController@purchase')->name('purchase');
    Route::resource('invoices', 'InvoiceController');
    // Route::get('sell', 'InvoiceController@sell')->name('sell');
    Route::get('reports', 'ReportController@index');
});
