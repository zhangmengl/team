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
    return view('admin.index');
});

    //后台登录
    Route::view("/login","admin.login");
    Route::post("/login/loginDo","admin\LoginController@loginDo");
    Route::get("/login/quit","admin\LoginController@quit");
    //后台首页
    Route::get("/admin/admin","admin\AdminController@admin");
    Route::prefix('/meeting')->middleware("islogin")->group(function(){
        //客户拜访管理列表
        Route::get("/index","admin\MeetingController@index");
        //客户拜访管理添加视图
        Route::get("/create","admin\MeetingController@create");
        //客户拜访管理添加执行
        Route::post("/store","admin\MeetingController@store");
        //客户拜访管理删除执行
        Route::get("/destroy/{id}","admin\MeetingController@destroy");
        //客户拜访管理修改视图
        Route::get("/edit/{id}","admin\MeetingController@edit");
        //客户拜访管理修改执行
        Route::post("/update/{id}","admin\MeetingController@update");
    });
    
    //后台管理员
    Route::prefix('/admin')->middleware("islogin")->group(function () {
        Route::get("/index","admin\AdminController@index");
        Route::get("/create","admin\AdminController@create");
        Route::post("/store","admin\AdminController@store");
        Route::get("/edit/{id}","admin\AdminController@edit");
        Route::post("/update/{id}","admin\AdminController@update");
        Route::get("/destroy/{id}","admin\AdminController@destroy");
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
