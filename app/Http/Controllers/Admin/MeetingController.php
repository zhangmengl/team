<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Meeting;
use App\Client;
use App\Sale;
use Validator;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //客户拜访列表
        $where=[
            ['meeting_delete','=',1]
        ];
        $res=Meeting::leftjoin("client","meeting.client_id","=","client.client_id")
        ->leftjoin("sale","meeting.sale_id","=","sale.sale_id")
        ->where($where)
        ->paginate(2);
        return view('admin.meeting.meeting',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //客户拜访添加视图
        $clientInfo=Client::all();
        $saleInfo=Sale::all();

        return view('admin.meeting.create',['clientInfo'=>$clientInfo,'saleInfo'=>$saleInfo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //客户访问添加执行
        $data=request()->except('_token');
        $validator=Validator::make($data,[
            'client_id'=>'required',
            'sale_id'=>'required',
            'meeting_man'=>'required',
            'meeting_address'=>'required',
            'meeting_desc'=>'required',
            'meeting_time'=>'required',
        ],[
            'client_id.required'=>'客户名称不能为空',
            'sale_id.required'=>'业务员名称不能为空',
            'meeting_man.required'=>'访问人不能为空',
            'meeting_address.required'=>'访问地址不能为空',
            'meeting_desc.required'=>'访问详情不能为空',
            'meeting_time.required'=>'下次访问时间不能为空',
        ]);
        if($validator->fails()){
            return redirect('/meeting/create')->withErrors($validator)->withInput();
        }
        $data['add_time']=time();
        $res=Meeting::insert($data);
        if($res){
            return redirect('/meeting/index');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //客户拜访修改视图
        $clientInfo=Client::all();
        $saleInfo=Sale::all();
        $res=Meeting::find($id);
        return view('admin.meeting.edit',['clientInfo'=>$clientInfo,'saleInfo'=>$saleInfo,'res'=>$res]);
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
        //客户拜访修改执行
        $data=request()->except('_token');
        $validator=Validator::make($data,[
            'client_id'=>'required',
            'sale_id'=>'required',
            'meeting_man'=>'required',
            'meeting_address'=>'required',
            'meeting_desc'=>'required',
            'meeting_time'=>'required',
        ],[
            'client_id.required'=>'客户名称不能为空',
            'sale_id.required'=>'业务员名称不能为空',
            'meeting_man.required'=>'访问人不能为空',
            'meeting_address.required'=>'访问地址不能为空',
            'meeting_desc.required'=>'访问详情不能为空',
            'meeting_time.required'=>'下次访问时间不能为空',
        ]);
        if($validator->fails()){
            return redirect('/meeting/edit/'.$id)->withErrors($validator)->withInput();
        }
        $data['add_time']=time();
        $res=Meeting::where('meeting_id',$id)->update($data);
        if($res){
            return redirect('/meeting/index');
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
        //客户拜访删除执行
        $res=Meeting::where('meeting_id',$id)->update(['meeting_delete'=>2]);
        if($res){
            return redirect('/meeting/index');
        }
    }
}
