<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>团队开发</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <!-- <a class="navbar-brand" href="#">后台管理</a> -->
    </div>
    <div>
        <ul class="nav navbar-nav">
        <!-- 首页 -->
        <li class="active" ><a href="{{url('/admin/admin')}}">首页</a></li>
	    <!-- 管理员 -->
        <li class="dropdown"  style="margin-left:25px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">管理员<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/admin/create')}}">管理员添加</a></li>
                <li><a href="{{url('/admin/index')}}">管理员列表</a></li>
            </ul>
        </li>
        <!-- 业务员 -->
        <li class="dropdown"  style="margin-left:25px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">业务员<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/sale/create')}}">业务员添加</a></li>
                <li><a href="{{url('/sale/index')}}">业务员列表</a></li>
            </ul>
        </li>
        <!-- 客户 -->
        <li class="dropdown"  style="margin-left:25px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">客户<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/client/create')}}">客户添加</a></li>
                <li><a href="{{url('/client/index')}}">客户列表</a></li>
            </ul>
        </li>
        <!-- 拜访会议 -->
        <li class="dropdown"  style="margin-left:25px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">拜访会议<span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="{{url('/meeting/create')}}">拜访会议添加</a></li>
                <li><a href="{{url('/meeting/index')}}">拜访会议列表</a></li>
            </ul>
        </li>
        <!-- 个人中心 -->
        <li  style="margin-left:500px;">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">个人中心 <span class="caret"></span></a>
            <ul class="dropdown-menu">
                    @if(session('userInfo')=='')
                    <li><a href="{{url('/login')}}">登录</a></li>
                    @else
                    <li><a href="">欢迎@php echo session("userInfo.admin_name") @endphp登录</a></li>
                    <li><a href="{{url('/login/quit')}}">退出</a></li>
                @endif
            </ul>
        </li>
    </ul>
    </div>
    </div>
   </nav> 

</body>
</html>