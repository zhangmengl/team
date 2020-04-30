@include('admin.layout.shop')
<center><h2>客户拜访添加</h2></center><br>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->

<form action="{{url('/meeting/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">客户名称</label>
    <div class="col-sm-2">
            <select class="form-control" name="client_id">
                <option value="">请选择客户名称</option>
               @foreach($clientInfo as $v)
                <option value="{{$v->client_id}}">{{$v->client_name}}</option>
                @endforeach
            </select>
            <b><font color="red">{{$errors->first('client_id')}}</font></b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">业务员名称</label>
    <div class="col-sm-2">
            <select class="form-control" name="sale_id">
                <option value="">请选择业务员名称</option>
                @foreach($saleInfo as $v)
                <option value="{{$v->sale_id}}">{{$v->sale_name}}</option>
                @endforeach
            </select>
            <b><font color="red">{{$errors->first('sale_id')}}</font></b>
            
    </div>
  </div>
  
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">访问人</label>
    <div class="col-sm-8">
			<input type="text" class="form-control" name="meeting_man" id="firstname" 
           placeholder="请输入访问人">
           <b><font color="red">{{$errors->first('meeting_man')}}</font></b>
      <b style="color:red"></b>     
		</div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">访问地址</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="meeting_address" id="firstname" 
           placeholder="请输入访问地址">
           <b><font color="red">{{$errors->first('meeting_address')}}</font></b>
           
      <b style="color:red"></b>     
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">访问详情</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="meeting_desc" id="firstname" 
           placeholder="请输入访问详情"></textarea>
           <b><font color="red">{{$errors->first('meeting_desc')}}</font></b>
           
      <b style="color:red"></b>     
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">下次访问时间</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="meeting_time" id="firstname" 
           placeholder="请输入下次访问时间">
           
           <b><font color="red">{{$errors->first('meeting_time')}}</font></b>

      <b style="color:red"></b>     
    </div>
  </div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">提交</button>
		</div>
	</div>
</form>

</body>
</html>