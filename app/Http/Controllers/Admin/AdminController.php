<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    //后台首页
    public function admin()
    {
        return view("admin.index");
    }
    /**
     * Display a listing of the resource.
     *列表展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where=[
            ["admin_delete","=",1]
        ];
        $admin=Admin::where($where)->paginate(2);

        if(request()->ajax()){
            return view("admin.admin.ajaxindex",['admin'=>$admin]);
        }

        return view("admin.admin.index",['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *添加列表
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证
        $request->validate([
            'admin_name' => 'required|unique:admin|regex:/^[\x{4e00}-\x{9fa5}\w]{2,20}$/u',
            'admin_pwd' => 'required|regex:/^[0-9a-z]{6,18}$/i',
            'admin_tel' => 'required|regex:/^1[3456789]\d{9}$/',
            'admin_email' => 'required',
        ],[
            'admin_name.required' => '管理员姓名必填！',
            'admin_name.unique' => '管理员姓名已存在！',
            'admin_name.regex' => '管理员姓名格式有误（由中文、数字、字母或下划线组成，长度2-20位）！',
            'admin_pwd.required' => '管理员密码必填！',
            'admin_pwd.regex' => '管理员密码格式有误（由数字或字母组成，不区分大小写，长度6-18位）！',
            'admin_tel.required' => '管理员手机必填！',
            'admin_tel.regex' => '管理员手机格式有误（必须是11位纯数字，由13、14、15、16、17、18或19开头）！',
            'admin_email.required' => '管理员邮箱必填！',
        ]);
        //接收所有
        $post=request()->except("_token");
        $res=Admin::insert($post);
        if($res){
            return redirect("/admin/index");
        }

    }

    /**
     * Display the specified resource.
     *资源详情
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑列表
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res=Admin::find($id);
        return view("admin.admin.edit",["res"=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //验证
        $request->validate([
            'admin_name' => ['required',
                              Rule::unique('admin')->ignore($id,'admin_id'),
                             'regex:/^[\x{4e00}-\x{9fa5}\w]{2,20}$/u'],
            'admin_pwd' => 'required|regex:/^[0-9a-z]{6,18}$/i',
            'admin_tel' => 'required|regex:/^1[3456789]\d{9}$/',
            'admin_email' => 'required',
        ],[
            'admin_name.required' => '管理员姓名必填！',
            'admin_name.unique' => '管理员姓名已存在！',
            'admin_name.regex' => '管理员姓名格式有误（由中文、数字、字母或下划线组成，长度2-20位）！',
            'admin_pwd.required' => '管理员密码必填！',
            'admin_pwd.regex' => '管理员密码格式有误（由数字或字母组成，不区分大小写，长度6-18位）！',
            'admin_tel.required' => '管理员手机必填！',
            'admin_tel.regex' => '管理员手机格式有误（必须是11位纯数字，由13、14、15、16、17、18或19开头）！',
            'admin_email.required' => '管理员邮箱必填！',
        ]);
        //接收所有
        $post=request()->except("_token");
        $res=Admin::where("admin_id",$id)->update($post);
        if($res!==false){
            return redirect("/admin/index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $res=Admin::where('admin_id',$id)->update(['admin_delete'=>0]);
        // dd($res);
        if($res==1){
            return redirect("/admin/index");
        }
    }
}
