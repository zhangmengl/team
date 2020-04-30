@include('admin.layout.shop')
<center><h2>商品列表</h2></center><br>
<div class="table-responsive">
	  <table class="table">
		    <thead>
			      <tr>
				        <th>ID</th>
				        <th>客户名称</th>
                <th>是否为会员</th>
				        <th>客户来源</th>
                <th>业务员id</th>
                <th>客户电话</th>
                <th>客户手机号</th>
                <th>操作</th>
			      </tr>
		    </thead>
		    <tbody>
            @foreach ($Info as $v) 
			      <tr>
				        <td>{{$v->client_id}}</td>
				        <td>{{$v->client_name}}</td>
                <td>{{$v->client_level==1 ? "√" : "×"}}</td>
                <td>{{$v->client_root}}</td>
                <td>{{$v->sale_name}}</td>
                <td>{{$v->client_phone}}</td>
                <td>{{$v->client_tel}}</td>
                <td>
                    <a href="{{url('/client/edit/'.$v->client_id)}}" class="btn btn-primary">编辑</a>
                    <a href="javascript:;" client_id="{{$v->client_id}}"  class="btn btn-danger">删除</a>
                </td>
			      </tr>
			      @endforeach
            <tr><td colspan="15">
        </tbody>
    </table> 
   </td>{{$Info->links()}}</tr>
</div>  	
<script>
    $(document).on("click",".btn-danger",function(){
      var  client_id = $(this).attr("client_id");
      if(window.confirm("是否删除！")){
        location.href="/client/destroy/"+client_id;
      }
    })
</script>
</body>
</html>