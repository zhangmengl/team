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
