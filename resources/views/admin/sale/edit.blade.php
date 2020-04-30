
@include('admin.layout.shop')
<center><h2>业务员编辑</h2></center><br>

<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->
<form action="{{url('/sale/update/'.$sale->sale_id)}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">业务员名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" value="{{$sale->sale_name}}" name="sale_name" id="firstname" 
           placeholder="请输入业务员名称...">
      <b style="color:red">{{$errors->first('sale_name')}}</b>     
		</div>
  </div>
  <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">性别</label>
		<div class="col-sm-8">
            <input type="radio" name="sale_sex" value="男" checked>男
            <input type="radio" name="sale_sex" value="女">女
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">办公电话</label>
    <div class="col-sm-8">
			<input type="text" class="form-control" value="{{$sale->sale_phone}}" name="sale_phone" id="firstname" 
           placeholder="请输入办公电话...">
      <b style="color:red">{{$errors->first('sale_phone')}}</b>     
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">手机号</label>
    <div class="col-sm-8">
			<input type="text" class="form-control" value="{{$sale->sale_tel}}" name="sale_tel" id="firstname" 
           placeholder="请输入手机号...">
      <b style="color:red">{{$errors->first('sale_tel')}}</b>     
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