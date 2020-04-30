<?php

use Illuminate\Support\Facades\Route;

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

    //后台登录
    Route::view("/login","admin.login");
    Route::post("/login/loginDo","admin\LoginController@loginDo");
    Route::get("/login/quit","admin\LoginController@quit");
    //后台首页
    Route::get("/admin/admin","admin\AdminController@admin");
    //后台管理员
    Route::prefix('/admin')->middleware("islogin")->group(function () {
        Route::get("/index","admin\AdminController@index");
    });
    //业务员管理
    Route::prefix('/sale')->middleware("islogin")->group(function () {
        Route::get("/index","Admin\SaleController@index");//列表展示
        Route::get('create','Admin\SaleController@create');//添加方法
        Route::post('store','Admin\SaleController@store');//执行添加
        Route::get('edit/{id}','Admin\SaleController@edit');//编辑展示
        Route::post('update/{id}','Admin\SaleController@update');
        Route::get('destroy/{id}','Admin\SaleController@destroy');//执行删除
    });
