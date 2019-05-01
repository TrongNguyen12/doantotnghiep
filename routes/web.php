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
Route::group(['namespace' => 'Admin'], function() {

    Route::group(['prefix' => 'login','middleware' => 'CheckLogedIn'], function() {
        Route::get('/', 'LoginController@getLogin');
        Route::post('/', 'LoginController@postLogin');
    });
    Route::get('logout', 'HomeController@getLogout');


    Route::group(['prefix' => 'admin','middleware' => 'CheckLogedOut'], function() {
       Route::get('/', 'HomeController@getHome');
       Route::group(['prefix' => 'category'], function() {
	        Route::get('/', 'CategoryController@getCate');
            Route::post('/', 'CategoryController@postCate');
            Route::get('/edit/{id}', 'CategoryController@getEditCate');
            Route::post('/edit/{id}', 'CategoryController@postEditCate');
            Route::get('/delete/{id}', 'CategoryController@getDeleteCate');
	    });
       Route::group(['prefix' => 'product'], function() {
            Route::get('/', 'ProductController@getProduct');
            Route::get('/add', 'ProductController@getAddProduct');
            Route::post('/add', 'ProductController@postAddProduct');
            Route::get('/edit/{id}', 'ProductController@getEditProduct');
            Route::post('/edit/{id}', 'ProductController@postEditProduct');
            Route::get('/delete/{id}', 'ProductController@getDeleteProduct');
        });
        Route::group(['prefix' => 'employees'], function() {
            Route::get('/', 'EmployeesController@getEmployees');
            Route::get('add', 'EmployeesController@getAddEmployees');
            Route::post('add', 'EmployeesController@postAddEmployees');
            Route::get('edit/{id}', 'EmployeesController@getEditEmployees');
            Route::post('edit/{id}', 'EmployeesController@postEditEmployees');
            Route::get('delete/{id}', 'EmployeesController@getDeleteEmployees');
            Route::get('lock/{id}', 'EmployeesController@getLockEmployees');
        });
        Route::group(['prefix' => 'customers'], function() {
            Route::get('/', 'CustomerController@getCustomer');
            Route::get('add', 'CustomerController@getAddCustomer');
            Route::post('add', 'CustomerController@postAddCustomer');
        });
        Route::group(['prefix' => 'sales'], function() {
            Route::get('/', 'PosController@getPos');
            Route::get('search', 'PosController@Search');
            Route::get('select', 'PosController@getSelectProduct');
            Route::post('addCustomer', 'PosController@postAddCustomersAjax');
            Route::get('searchCustomer', 'PosController@SearchCustomer');
            Route::post('addOrder', 'PosController@addOrder');
            Route::post('saveOrderDetail', 'PosController@saveOderDetail');
            Route::get('printOrder/{id}', 'PosController@printOrder');
        });
        Route::group(['prefix' => 'order'], function() {
            Route::get('/', 'OrderController@getOrder');
            Route::get('quickview/{id}', 'OrderController@getQuickViewOrder');
            Route::get('findOrder', 'OrderController@findOrderAjax');

        });
        Route::group(['prefix' => 'suppliers'], function() {
            Route::get('/', 'SupplierController@getSupplier');
            Route::get('add', 'SupplierController@getAddSupplier');
            Route::post('add', 'SupplierController@postAddSupplier');
        });
        Route::group(['prefix' => 'posimport'], function() {
            Route::get('/', 'ImportPosController@getImport');
            Route::post('addSupplier', 'ImportPosController@postAddSupplier');
            Route::get('/searchSuppliers', 'ImportPosController@searchSupplier');
            Route::post('addInputBill', 'ImportPosController@addInputBill');
            Route::post('addInputBillDetail', 'ImportPosController@addInputBillDetail');
            Route::get('/printBill/{id}', 'ImportPosController@printInputBill');
            Route::get('/view', 'ImportPosController@getViewInputBill');
        });
    });
});
Route::get('test', 'TestController@getInfo');
Route::get('drop', function() {
     //Schema::dropIfExists('vp_inputbill_detail');
    // Schema::dropIfExists('vp_orders');
});