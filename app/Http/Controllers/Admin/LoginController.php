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
        if(!empty($res)){
            if($admin['admin_pwd']!=$res['admin_pwd']){
                return redirect('/login')->with('pw',"密码错误");
            }
            session(["userInfo"=>$res]);
            return redirect("/admin/admin");
        }else{
            return redirect('/login')->with('pws',"账号有误");
        }
        
        
    }
    //退出
    public function quit(){
        session(["userInfo"=>null]);
        return redirect("/login");
    }
}
