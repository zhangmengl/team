@include('admin.layout.shop')
<center><h2>商品列表</h2></center><br>


<hr>
<div class="table-responsive">
	  <table class="table">
		    <thead>
			    <tr>
				    <th>拜访会议ID</th>
				    <th>客户名称</th>
                    <th>客户名称</th>
                    <th>访问时间</th>
                    <th>访问人</th>
                    <th>访问地址</th>
                    <th>访问详情</th>
                    <th>下次访问时间</th>
                    <th>操作</th>
			    </tr>
		    </thead>
            @foreach($res as $v)
		    <tbody>
           
			    <tr meeting_id="{{$v->meeting_id}}">
                    <td>{{$v->meeting_id}}</td>
                    <td>{{$v->client_name}}</td>
                    <td>{{$v->sale_name}}</td>
                    <td>{{date("Y-m-d H:i:s",$v->add_time)}}</td>
                    <td>{{$v->meeting_man}}</td>
                    <td>{{$v->meeting_address}}</td>
				    <td>{{$v->meeting_desc}}</td>
                    <td>{{$v->meeting_time}}</td>
                    <td>
                        <a href="{{url('/meeting/edit/'.$v->meeting_id)}}" class="btn btn-primary">编辑</a>
                        <a href="javascript:;" class="btn btn-danger del">删除</a>
                    </td>
			    </tr>
        </tbody>
        @endforeach
        <tr>
            <td colspan="8">
                {{$res->links()}}                
            </td>
        </tr>
    </table>
</div>  	

<script>
    $(document).on("click",".del",function(){
        var _this=$(this)
        var meeting_id=_this.parents("tr").attr("meeting_id");
        if(window.confirm("确认删除？")){
            location.href="/meeting/destroy/"+meeting_id;
        }
    });
</script>

</body>
</html>