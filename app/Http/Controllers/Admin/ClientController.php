<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;
use App\Sale;
use Illuminate\Validation\Rule;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Saleinfo = Sale::all();
        $client_name = request()->client_name;
        $sale_name = request()->sale_name;
        $where2 = [['client_delete','=',1]];
        $pageSize = 2;
        $Info = 
        Client::leftjoin("sale","client.sale_id","=","sale.sale_id")
        ->where($where2)
        ->paginate($pageSize);
        return view('admin.client.index',['Info'=>$Info,'Saleinfo'=>$Saleinfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $SaleList = Sale::all();
        return view('admin.client.create',['SaleList'=>$SaleList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 验证
        $request->validate([
            'client_name' => 'required|unique:client|regex:/^[\x{4e00}-\x{9fa5}(a-zA-Z0-9)]{1,18}$/u',
            'client_tel' => 'required|regex:/^1[356789]\d{9}$/',
            'client_root' => 'required',
            'client_phone' => 'required',
        ],[
            'client_name.required' => '客户名称必填！',
            'client_name.unique' => '客户名称已存在！',
            'client_name.regex' => '客户名称由（中文/字母/数字）组成，长度1-18位！',
            'client_tel.required' => '手机号电话必填！',
            'client_tel.regex' => '手机号格式不正确！',
            'client_root.required' => '客户来源必填！',
            'client_phone.required' => '电话号密码必填！',
        ]);
        $data = $request->except('_token');
        $res = Client::insert($data);
        if($res){
            return redirect("/client/index");
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
        $SaleList = Sale::all();
        $ClientList = Client::find($id);
        return view("admin.client.edit",['SaleList'=>$SaleList,'ClientList'=>$ClientList]);
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
         // 验证
         $request->validate([
            'client_name' => ['required',
                               Rule::unique('client')->ignore($id, 'client_id'),
                              'regex:/^[\x{4e00}-\x{9fa5}(a-zA-Z0-9)]{1,18}$/u'],
            'client_tel' => 'required|regex:/^1[356789]\d{9}$/',
            'client_root' => 'required',
            'client_phone' => 'required',
        ],[
            'client_name.required' => '客户名称必填！',
            'client_name.unique' => '客户名称已存在！',
            'client_name.regex' => '客户名称由（中文/字母/数字）组成，长度1-18位！',
            'client_tel.required' => '手机号电话必填！',
            'client_tel.regex' => '手机号格式不正确！',
            'client_root.required' => '客户来源必填！',
            'client_phone.required' => '电话号密码必填！',
        ]);
        $data = $request->except('_token');
        $res=Client::where("client_id",$id)->update($data);
        if($res!==false){
            return redirect("/client/index");
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
        $res = Client::where('client_id',$id)->update(['client_delete'=>2]);
        if($res == 1){
            return redirect("/client/index");
        }
    }
}
