@include('admin.layout.shop')

<center><h2>管理员添加</h2></center><br>

<form action="{{url('admin/store')}}" method="post" class="form-horizontal" role="form">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员姓名</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" name="admin_name" placeholder="请输入管理员姓名">
      <b style="color:red">{{$errors->first('admin_name')}}</b>     
		</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">管理员密码</label>
    <div class="col-sm-8">
		<input type="password" class="form-control" name="admin_pwd" placeholder="请输入管理员密码">
        <b style="color:red">{{$errors->first('admin_pwd')}}</b>     
	</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">管理员手机号</label>
    <div class="col-sm-8">
		<input type="text" class="form-control" name="admin_tel" placeholder="请输入管理员手机号">
        <b style="color:red">{{$errors->first('admin_tel')}}</b>     
	</div>
  </div>
  <div class="form-group">
	  <label for="firstname" class="col-sm-2 control-label">管理员邮箱</label>
    <div class="col-sm-8">
        <input type="email" class="form-control" name="admin_email" placeholder="请输入管理员邮箱">  
        <b style="color:red">{{$errors->first('admin_email')}}</b>   
	</div>
  </div>
 
  <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">管理级别</label>
		<div class="col-sm-8">
            <input type="radio" name="admin_level" value="1" checked>普通管理员
            <input type="radio" name="admin_level" value="2">产品经理
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