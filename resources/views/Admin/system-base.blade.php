<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="{{ asset('Admin/favicon.ico') }}" >
<LINK rel="Shortcut Icon" href="{{ asset('Admin/favicon.ico') }}" />
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
<!--/meta 作为公共模版分离出去-->

<title>系统设置</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 系统管理 <span class="c-gray en">&gt;</span> 基本设置 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<form class="form form-horizontal" id="form-article-add" action="{{ URL('system') }}" method="post">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div id="tab-system" class="HuiTab">
			@foreach($reg as $a)
			<div class="tabBar cl"><span>基本设置</span></div>
			<div class="tabCon">
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站名称：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-title" placeholder="最好起个帅点的" value="{{ $a->name }}" name="name" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>网站开关：</label>
					<div class="formControls col-xs-8 col-sm-9">
					开：<input type="radio" name="kg" value="1">
					关：<input type="radio" name="kg" value="2">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>底部版权信息：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-copyright" name="banquan" placeholder="&copy; 2016 外卖超人后台管理系统" value="{{ $a->banquan }}" class="input-text">
					</div>
				</div>
				<div class="row cl">
					<label class="form-label col-xs-4 col-sm-2">备案号：</label>
					<div class="formControls col-xs-8 col-sm-9">
						<input type="text" id="website-icp" placeholder="京ICP备00000000号" name="beianhao" value="{{ $a->beianhao }}" class="input-text">
					</div>
				</div>
			</div>
			@endforeach
			<div class="row cl">
				<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
					<button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
				</div>
			</div>
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{ asset('/Admin/lib/jquery/1.9.1/jquery.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/lib/layer/2.1/layer.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/lib/icheck/jquery.icheck.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/lib/jquery.validation/1.14.0/jquery.validate.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/lib/jquery.validation/1.14.0/validate-methods.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/lib/jquery.validation/1.14.0/messages_zh.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/static/h-ui/js/H-ui.js') }}"></script> 
<script type="text/javascript" src="{{ asset('/Admin/static/h-ui.admin/js/H-ui.admin.js') }}"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	$.Huitab("#tab-system .tabBar span","#tab-system .tabCon","current","click","0");
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
          @if(session("msg"))
               <span style="color:red;font-size:20px;margin-left:300px;">{{session("msg")}}</span>
          @endif
</body>
</html>