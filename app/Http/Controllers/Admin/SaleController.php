<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Sale;
use Validator;
use Illuminate\Validation\Rule;
class SaleController extends Controller
{
    /**列表展示
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $where=[
            ['sale_delete','=',1]
        ];
        $sale= Sale::orderBy('sale_id','desc')->where($where)->paginate(2);
        if(request()->ajax()){
            return view('admin.sale.ajaxindex',['sale'=>$sale]);
        }
        return view('admin.sale.index',['sale'=>$sale]);
    }

    /**添加方法
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sale.create');
    }

    /**执行添加
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //排除接受
        $post = request()->except(['_token']);
        $validator = Validator::make($post,[
            'sale_name'=>'required|unique:sale|max:13',
            'sale_phone'=>'required',
            'sale_tel'=>'required',
            ],[
                'sale_name.required'=>'业务员必填',
                'sale_name.unique'=>'业务员必填',
                'sale_phone.required'=>'办公电话不能为空',
                'sale_tel.required'=>'手机号必填',
         ]);
         if($validator->fails()){
             return redirect('/sale/create')->withErrors($validator)->withInput();
         }
        $res = Sale::insert($post);
        if($res){
            return redirect('/sale/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**修改方法
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale  = Sale::find($id);
        return view('admin.sale.edit',['sale'=>$sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //排除接受
        $post = request()->except(['_token']);
        $validator = Validator::make($post,[
            'sale_name'=>['required',
                           Rule::unique('sale')->ignore($id,'sale_id'),
                          'max:13'],
            'sale_phone'=>'required',
            'sale_tel'=>'required',
            'sale_tel' => 'required:/^1[345789][0-9]{9}$/',
            ],[
                'sale_name.required'=>'业务员必填',
                'sale_name.unique'=>'业务员已存在',
                'sale_phone.required'=>'办公电话不能为空',
                'sale_tel.required'=>'手机号必填',
                
         ]);
         if($validator->fails()){
             return redirect('/sale/edit/'.$id)->withErrors($validator)->withInput();
         }
        $res = DB::table('sale')->where('sale_id',$id)->update($post);
        if($res!==false){
            return redirect('/sale/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=Sale::where('sale_id',$id)->update(['sale_delete'=>2]);
        if($res){
            return redirect('/sale/index');
        }
    }
}
