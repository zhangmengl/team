@include('admin.layout.shop')

<center><h2>管理员列表</h2></center><br>

<div class="table-responsive">
	  <table class="table">
		    <thead>
			    <tr>
                    <th>ID</th>
                    <th>管理员姓名</th>
                    <th>管理员手机号</th>
                    <th>管理员邮箱</th>
                    <th>管理级别</th>
                    <th>操作</th>
			    </tr>
		    </thead>
		    <tbody>
            @foreach ($admin as $v) 
			    <tr>
				    <td>{{$v->admin_id}}</td>
				    <td>{{$v->admin_name}}</td>
                    <td>{{$v->admin_tel}}</td>
                    <td>{{$v->admin_email}}</td>
                    <td>{{$v->admin_level==1 ? "普通管理员" : "产品经理"}}</td>
                    <td>
                    <a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-primary">编辑</a>
                    <a href="javascript:;" admin_id="{{$v->admin_id}}" class="btn btn-danger">删除</a>
                    </td>
			    </tr>
                @endforeach
                <tr><td colspan="6">{{$admin->links()}}</td></tr>
        </tbody>
    </table>
</div>  	

<script>
    //ajax删除
    $(document).on("click",".btn-danger",function(){
        var admin_id=$(this).attr("admin_id");
        if(window.confirm("是否确认删除！")){
            location.href="/admin/destroy/"+admin_id;
        }
    })
    //无刷新分页
    $(document).on("click",".pagination a",function(){
        var url=$(this).attr("href");
        $.get(url,function(result){
            $("tbody").html(result);
        });
        return false;
    });
</script>

</body>
</html>