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