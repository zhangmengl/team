@include('admin.layout.shop')
<center><h2>客户添加</h2></center><br>
<!-- @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif -->
<form action="{{url('client/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">客户名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="client_name" id="firstname" 
           placeholder="请输入客户名称">   
           <b style="color:red">{{$errors->first('client_name')}}</b>
		</div>
  </div>
  <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否会员</label>
		<div class="col-sm-8">
            <input type="radio" name="client_level" value="1" checked>是
            <input type="radio" name="client_level" value="2">否
		</div>
  </div>	
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">客户来源</label>
    <div class="col-sm-8">
         <textarea name="client_root" id="" class="form-control" cols="30" rows="5" placeholder="请输入客户来源"></textarea>   
         <b style="color:red">{{$errors->first('client_root')}}</b>
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">业务员</label>
    <div class="col-sm-8">
       <select name="sale_id" id="">
          <option value="">--请选择--</option>
          @foreach($SaleList as $v)
          <option value="{{$v->sale_id}}">{{$v->sale_name}}</option>
          @endforeach
       </select>
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">客户电话</label>
    <div class="col-sm-8">
         <input type="text" class="form-control" name="client_phone" id="firstname"
         placeholder="请输入客户电话"> 
         <b style="color:red">{{$errors->first('client_phone')}}</b>    
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">客户手机号</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" name="client_tel" id="firstname"
         placeholder="请输入客户手机号"> 
         <b style="color:red">{{$errors->first('client_tel')}}</b> 
		</div>
  </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>