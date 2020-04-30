

@include('admin.layout.shop')

<center><h2>业务员列表</h2></center><br>

<div class="table-responsive">
	  <table class="table">

	<thead>
		<tr>
			<th>业务员id</th>
			<th>业务员名称</th>
			<th>性别</th>
			<th>办公电话</th>
			<th>手机号</th>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
	@foreach($sale as $v)
		<tr sale_id="{{$v->sale_id}}">
			<td>{{$v->sale_id}}</td>
			<td>{{$v->sale_name}}</td>
			<td>{{$v->sale_sex}}</td>
			<td>{{$v->sale_phone}}</td>
			<td>{{$v->sale_tel}}</td>
			<td><a href="{{url('/sale/edit/'.$v->sale_id)}}" class="btn btn-primary">
			编辑</a>
			<a  href="{{url('/sale/destroy/'.$v->sale_id)}}" class="btn btn-danger del">
			删除</a></td>
		</tr>
		@endforeach
		<tr><td colspan="6">{{$sale->links()}}</td></tr>
	</tbody>
</table>
<script>
    //加载页面
    $(document).ready(function(){
        //增加点击事件
        $(".del").click(function(){
            //获取删除按钮
            var _this=$(this);
            //console.log(_this)
            //获取祖先级节点 parents
            var sale_id=_this.parents("tr").attr("sale_id");
            if(window.confirm('是否确认删除')){
           location.href="/sale/destroy/"+sale_id;
            }
        })
        
        })
        //无刷新分页
			 $(document).on('click','.page-item a',function(){
			var url = $(this).attr('href');
			$.get(url,function(result){
				$('tbody').html(result);
			});
			
			return false;
		})
</script>
</body>
</html>