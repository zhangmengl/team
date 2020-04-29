<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class LoginController extends Controller
{
    //执行登陆
    public function loginDo(){
        $admin=request()->except("_token");
        $res=Admin::where("admin_name",$admin['admin_name'])->first();
        if($res==""){
            return redirect("/login")->with("admin_name","账号有误！");
        }else if($res["admin_pwd"]!=$admin["admin_pwd"]){
            return redirect("/login")->with("admin_pwd","密码有误!");
        } 
        session(["userInfo"=>$res]);
        // dd(session("userInfo"));
        return redirect("/admin/admin");
    }
    //退出
    public function quit(){
        session(["userInfo"=>null]);
        return redirect("/login");
    }
}
