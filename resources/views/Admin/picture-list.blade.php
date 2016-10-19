<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{ asset('Admin/lib/html5.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/respond.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/PIE_IE678.js') }}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui/css/H-ui.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/H-ui.admin.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/Hui-iconfont/1.0.7/iconfont.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/lib/icheck/icheck.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/skin/default/skin.css') }}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{ asset('Admin/static/h-ui.admin/css/style.css') }}" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>反馈列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户反馈 <span class="c-gray en">&gt;</span> 反馈列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!--29行到34行是显示条数和检索-->
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">

		</form>
	</div>

		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="70">用户名</th>
					<th width="80">电话</th>
					<th width="120">时间</th>
					<th width="100">内容</th>
                                        <th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			@foreach($li as $p)
				<tr id="a{{ $p->id }}" class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<td >{{ $p->uid }}</td>
					<td>{{ $p->phone }}</td>
					<td>{{ $p->data }}</td>
					<td>{{ $p->content }}</td>
                                        <td><span onclick="operation({{ $p->id }});">删除</span></td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</div>
<script type="text/javascript" src="{{ asset('Admin/lib/jquery/1.9.1/jquery.min.js') }}"></script> 
<script>
    function operation(dx){
        if(confirm("确认继续吗")){
            $.ajax({
                url:'/picturelistdelete',
                type:'get',
                async:true,
                data:{id:dx},
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    if(data === 'y'){
                        $("#a"+dx).remove();
                    }else{
                        alert('no');
                    }
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });
        }
    }
</script>
<script type="text/javascript" src="{{ asset('Admin/lib/layer/2.1/layer.js') }}"></script>
<script type="text/javascript" src="{{ asset('Admin/lib/My97DatePicker/WdatePicker.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/lib/datatables/1.10.0/jquery.dataTables.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script type="text/javascript" src="{{ asset('Admin/static/h-ui.admin/js/H-ui.admin.js') }}"></script> 

<script type="text/javascript">
$('.table-sort').dataTable({
	// "aaSorting": [[ 1, "desc" ]],//默认第几个排序
	// "bStateSave": true,//状态保存
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  // {"orderable":false,"aTargets":[0,6]}// 制定列不参与排序
	]
});
</script>
</body>
</html>
