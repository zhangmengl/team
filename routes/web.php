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
    // 客户
    Route::prefix('/client')->middleware("islogin")->group(function () {
        Route::get("/create","admin\ClientController@create");
        Route::post("/store","admin\ClientController@store");
        Route::get("/index","admin\ClientController@index");
        Route::get("/destroy/{id}","admin\ClientController@destroy");
        Route::get("/edit/{id}","admin\ClientController@edit");
        Route::post("/update/{id}","admin\ClientController@update");
    });
    