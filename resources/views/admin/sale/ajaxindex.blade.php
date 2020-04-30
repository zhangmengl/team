@foreach($sale as $v)
		<tr sale_id="{{$v->sale_id}}">
			<td>{{$v->sale_id}}</td>
			<td>{{$v->sale_name}}</td>
			<td>{{$v->sale_sex}}</td>
			<td>{{$v->sale_phone}}</td>
			<td>{{$v->sale_tel}}</td>
			<td><a href="{{url('/sale/edit/'.$v->sale_id)}}" class="btn btn-primary">
			编辑</a> | <a  href="{{url('/sale/destroy/'.$v->sale_id)}}" class="btn btn-danger del">
			删除</a></td>
		</tr>
		@endforeach
		<tr><td colspan="6">{{$sale->links()}}</td></tr>