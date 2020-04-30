@include('admin.layout.shop')
<center><h2>客户拜访编辑</h2></center><br>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->

<form action="{{url('/meeting/update/'.$res->meeting_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
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
            <b style="color:red">{{$errors->first('client_id')}}</b>
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
            <b style="color:red">{{$errors->first('sale_id')}}</b>
    </div>
  </div>
  
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">访问人</label>
    <div class="col-sm-8">
			<input type="text" class="form-control" name="meeting_man" value="{{$res->meeting_man}}" id="firstname" 
           placeholder="请输入访问人">
           
      <b style="color:red">{{$errors->first('meeting_man')}}</b>
		</div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">访问地址</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" value="{{$res->meeting_address}}" name="meeting_address" id="firstname" 
           placeholder="请输入访问地址">
           
      <b style="color:red">{{$errors->first('meeting_address')}}</b>     
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">访问详情</label>
    <div class="col-sm-8">
      <textarea class="form-control" name="meeting_desc" id="firstname" 
           placeholder="请输入访问详情">{{$res->meeting_desc}}</textarea>
           
      <b style="color:red">{{$errors->first('meeting_desc')}}</b>     
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">下次访问时间</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" value="{{$res->meeting_time}}" name="meeting_time" id="firstname" 
           placeholder="请输入下次访问时间">
           
      <b style="color:red">{{$errors->first('meeting_time')}}</b>     
    </div>
  </div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">编辑</button>
		</div>
	</div>
</form>

</body>
</html>