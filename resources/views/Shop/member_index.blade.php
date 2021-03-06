<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="description" content="" />
        <meta name="viewport" content="user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="BstJA3X9z6f9HcvoN9AZTwaKo_9Abj_j7dVBPfy640s" />
        <meta name="baidu-site-verification" content="IYCrtVH0i1" />
        <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="Shop/js/jquery-1.8.3.min.js"></script>
        <link rel="icon" type="image/png" href="images/favicon.ico"/>

        <script type="text/javascript">

            (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
        </script>

        <link rel="stylesheet" href="{{ asset('Shop/css/common.css') }}"/>

        <link rel="stylesheet" href="{{ asset('Shop/css/user_center.css') }}"/>

        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <!--[if lt IE 9]>
        <script src="{{ asset('Shop/js/respond.js') }}"></script>
        <script>
            var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
             var i= e.length;while (i--){document.createElement(e[i])}
        </script>
        <![endif]-->
        <title>个人中心 - 账号管理</title>
    </head>
    <body class="day " ng-controller="bodyCtrl"  day-or-night>
        <section class="common-back" id="wrapBackground">

                <header id="header">
                    <div class="common-width clearfix">
                        <h1 class="fl">
                            <a class="logo base-logo" href="/">外卖超人</a>
                        </h1>

                            <ul id="member" class="member" login-box>
                                <li><a href="shop_list?id={{ $_GET['id'] }}" class="index">首页</a></li>
                                <li class="login-register">
                                    @if(empty(session("username")))
                                        <a href="/login?id={{ $_GET['id'] }}&status=1"  class="login"  >登录</a>
                                        <span class="cg">/</span><a href="/login?id={{ $_GET['id'] }}&status=2"  class="register">注册</a></li>
                                    @else
                                        <li class="userName">
                                            <a href="/member_index?id={{ $_GET['id'] }}" draw-user>{{ session("username") }}<em></em></a>
                                            <div>
                                                <p><a href="/member_index?id={{ $_GET['id'] }}" >账号管理</a></p>
                                                <p><a href="/member_addr?id={{ $_GET['id'] }}" >地址管理</a></p>
                                                <p class="no-bo"><a  href="#" onclick="exit()">退出</a></p>
                                            </div>
                                        </li>
                                            <li><a href="/member_order?id={{ $_GET['id'] }}" class="order-center" >查看订单</a></li>
                                            <li class=""><a href="/member_collect?id={{ $_GET['id'] }}" >我的收藏</a></li>
                                            <li class=""><a  href="#" onclick="exit()">退出</a></li>
                                    @endif
                        
                        
                                <input type="hidden" value="{{ $_GET['id'] }}" id="hidden">
                                <script type="text/javascript">
    
                                    function exit(){
                                        var hiddenid = $('#hidden').val();
                                        $.ajax({
                                           url:'/logout',
                                           type:'post', 
                                           async:true,
                                           headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                           },
                                           success:function(a){
                                            if( a === 'y'){
                                                location.href = "/";
                                            }else{
                                                alert('退出失败');
                                            }
                                           },
                                           error:function(){
                                               alert('ajax失败');
                                           }
                                        });
                                    };
                                </script>
                            </ul>

                    </div>
                </header>

            <div id="main-box">
                 <!--二维码-->
                <div class="qrCode-frame" ng-hide="qrCodeStatus">
                    <img src="{{ asset('Shop/images/wx.png') }}" alt="扫描二维码" />
                    <em ng-click="qrCodeStatus=true">X</em>
                </div>

                <div ng-controller="colorAction">
                    <div class="dayColor_two"></div>
                    <div class="dayColor_one"></div>
                    <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
                </div>


        <section>
            <div class="user-center-main-box common-width clearfix">
                <aside class="fl">
                    <ul>
                        <li  class="active">
                            <a href="/member_index?id={{ $_GET['id'] }}" rel="nofollow">账号管理</a>
                        </li>
                        <li>
                            <a href="/member_order?id={{ $_GET['id'] }}" rel="nofollow">我的订单</a>
                        </li>
                        <li >
                            <a href="/member_collect?id={{ $_GET['id'] }}" rel="nofollow">我的收藏</a>
                        </li>
                        <li>
                            <a href="/member_addr?id={{ $_GET['id'] }}"  rel="nofollow">地址管理</a>
                        </li>
                    </ul>
                </aside>
                <article class="fl user-center-main">
                    <header>账号管理</header>

         <section class="user-account-body">
            <ul class="fs12">
                <li>
                    <label>手机号码：</label>
                    <span id="userid">{{ session("username") }}</span>
                </li>
                <li>
                    <label>登录密码：</label>
                    <span>**********</span>
                    <i class="icon edit-icon" ng-click="showChangePassword()"></i>
                </li>
                <li>
                    <label>订单信息：</label>
                    <span>总计0单</span>
                    <span>成功0单</span>
                </li>
            </ul>
         </section>


                </article>
            </div>
        </section>

            </div>
        </section>

            <footer id="footer">
            <div class="footer-first gray">
                <div class="company-info clearfix fs14 gray">
                    <a href="about.html" target="_blank"  rel="nofollow">关于我们</a>
                    <a href="help.html" target="_blank"  rel="nofollow">帮助中心</a>
                    <a href="javascript:;" target="_blank"  rel="nofollow">法律声明</a>
                    <a href="jobs.html" target="_blank"  rel="nofollow">人才招聘</a>
                    <a href="contact.html" target="_blank"  rel="nofollow">联系我们</a>
                    <a href="javascript:;" user-feedback ng-click="userFeedback=true" class="last" rel="nofollow">意见反馈</a>
                    <a href="javascript:;" class="last" target="_blank" style="display:none">上海餐厅导航</a>
                </div>
            </div>
            <div class="footer-last">
                <a target="_blank" class="foot-logo-1 base-logo" href="index.html"></a>
                <div class="tc fs14 light-gray mb10">
                  ©2014 waimaichaoren.com All Rights Reserved - 沪ICP备11019908号
                </div>
            </div>
        </footer>


        <dh-dialog class="disnone" height="500" feeedbackclass="userFeedback" type="user-feedback" header="意见反馈" show="userFeedback">
            <div ng-controller="feedbackCtrl">
                <form novalidate="true" name="feedbackForm" class="inline">
                    <div class="form-group row mb10">
                        <label class="col-3">联系方式：</label>
                        <div class="col-8">
                            <input type="text" maxlength="20" name="userContact" required ng-focus="userContactFocus()" ng-class="{error:feedback.phoneMessage}" placeholder="请输入您的手机号码" ng-model="feedback.userContact"/>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="clo-8 col-offset-3" ng-if="feedback.phoneMessage">
                            <span class="vaildate-error">联系方式不能为空</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3 vt">反馈信息：</label>
                        <div class="col-8">
                            <textarea name="feedbackMessage"  placeholder="可以说说您对外卖超人的意见" ng-focus="feedbacFocus()" required ng-class="{error:feedback.feedbackMessageTip}" ng-model="feedback.feedbackMessage" maxlength="300" cols="25" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row mb10">
                        <div class="clo-8 col-offset-3" ng-if="feedback.feedbackMessageTip">
                            <span class="vaildate-error">反馈信息不能为空</span>
                        </div>
                    </div>
                    <div class="tc">
                        <button class="btn normal-btn btn-success" ng-click="feedbackSubmit()">确认</button>
                        <button class="btn normal-btn btn-cancel" ng-click="feedbackCancel()">取消</button>
                    </div>
                </form>
            </div>
            <div class="common-dialog-footer">
                咨询加QQ群：337212031
            </div>
        </dh-dialog>

        <dh-dialog id="ok" class="disnone" id="xgcg" header="修改登录密码" height="500" show="showChangePass" >
            <!--<i ng-show="!hideclose" class="icon close-icon" ng-click="show=false"></i>-->
            <div ng-controller="changePasswordCtrl" class="change-password-box">
                <div class="form-group">
                    <label>当前密码</label>
                    <div>
                        <input type="password" id="password1" ng-class="{error:user.passwordMessage}" onpaste="return false" maxlength="10" placeholder="请输入当前使用的登录密码" ng-model="user.password" />
                        <span id="bd" class="vaildate-error" style="display:">
                            <span></span>
                        </span>
                    </div>
                </div>
                <div class="form-group mb10">
                    <label>新的密码</label>
                    <div>
                        <input type="password" id="password2" ng-class="{error:user.newPasswordMessage}" onpaste="return false" maxlength="10"  placeholder="请输入 6-10个字符" ng-model="user.newPassword" />
                        <span id="bd2" class="vaildate-error"></span>
                    </div>
                </div>
                <div class="form-group mb20">
                    <div>
                        <input type="password" id="password3" ng-class="{error:user.newPassword2Message}" onpaste="return false" maxlength="10"  placeholder="请再次输入新的密码" ng-model="user.newPassword2"/>
                        <span id="bd3"class="vaildate-error"></span>
                    </div>
                </div>
                <div class="tr">
                    <button class="btn small-btn btn-success" id="button">确认</button>
                    <button class="btn small-btn btn-cancel" ng-click="changePassCancel()">取消</button>
                </div>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" >
            <div class="alert-box">
                <p>修改密码成功</p>
                <p class="fs12">3秒后自动关闭</p>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" type="alert" height="500" index="1001" header="" show="requestError">
            <div class="alert-box error">
                <p>修改密码失败</p>
            </div>
        </dh-dialog>

         <ul class="site-fixed">
            <li class="scroll-top"><img src="{{ asset('Shop/images/scroll_top1.png') }}" alt=""/> </li>
            <li class="scorll-feekback" ng-click="userFeedback=true">
                <img src="{{ asset('Shop/images/scorll_feekback.png') }}" alt=""/>
                <div>意见反馈</div>
            </li>
            <li class="scroll-wx">
                <img src="{{ asset('Shop/images/scroll_wx.png') }}" alt=""/>
                 <div><img src="{{ asset('Shop/images/wx.png') }}" alt=""/></div>
            </li>
        </ul>

        <script type="text/javascript" src="{{ asset('Shop/js/angular.min.js') }}"></script>
        <script src="{{ asset('Shop/js/common.js') }}"></script>


        <script src="{{ asset('Shop/js/service.js') }}"></script>

        <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        <!--[if lt IE 9]><script src="{{ asset('Shop/js/fix.js') }}"></script><![endif]-->


        <script>
            var reviewUrl = "/mobile/ajax/order_review/",favoriteUrl = "/ajax/restaurant/0/favorite/";
        </script>
        <script src="{{ asset('Shop/js/user_center.js') }}"></script>


        <script>angular.bootstrap(document, ["app"]);</script>
        <script src="{{ asset('Shop/js/jquery-1.8.3.min.js') }}"></script>
        <script>
            $("#button").attr("disabled", true);
            $("#bd").css("color","red");
            $("#password1").focus(function(){
                $("#bd").html("");
                $("#bd").css("color","red");
            });
            //判断当前用户输入的密码是否与数据库中是否一致
            $("#password1").mouseleave(function(){
                var regEx = new RegExp(/^[a-zA-Z0-9]{6,10}$/);
                var id = "{{ session("username") }}";
                var password = $("#password1").val();
                //alert(id);
                //alert(password);
                if(!password.match(regEx)){
                    $("#bd").html("密码为6 - 10位字符");
                }else{
                    $.ajax({
                    url:'/findpassword',
                    type:'post',
                    async:true,
                    data:{id:id,password:password},
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success:function(a){
                            if(a === 'y'){
                                $("#bd").html("请输入新的密码");
                                $("#bd").css("color","green");
                                aa = 'ok';
                            }else{
                                $("#bd").html("密码认证错误请重新输入");
                                $("#bd").css("color","red");
                                $("#button").attr("disabled", true);
                                aa = 'no'
                                
                            }
                    },
                    error:function(){
                            alert('网站错误请联系管理员');
                    }
                 })
                }
            });
            $("#password2").mouseleave(function(){
                var regEx = new RegExp(/^[a-zA-Z0-9]{6,10}$/);
                var password2 = $("#password2").val();
                var password3 = $("#password3").val();
                if(!password2.match(regEx)){
                    $("#bd2").html("密码为6 - 10位字符");
                }else{
                    $("#bd2").html("");
                     if(aa == 'ok'){
                        if(password3 == ''){
                            $("#button").attr("disabled", true);
                        }
                        if(password3 !== password2 ){
                            $("#button").attr("disabled", true);
                        }
                        if(aa !== 'ok'){
                            $("#button").attr("disabled", true);
                        }
                    }else{
                        $("#button").attr("disabled", true);
                    }
                }
            });
            $("#password3").mouseleave(function(){
                var regEx = new RegExp(/^[a-zA-Z0-9]{6,10}$/);
                var password1 = $("#password1").val();
                var password2 = $("#password2").val();
                var password3 = $("#password3").val();
                if(!password3.match(regEx)){
                    $("#bd3").html("密码为6 - 10位字符");
                }else{
                    $("#bd3").html("");
                    if(password3 !== password2){
                        $("#bd3").html("二次密码输入不一致");
                        $("#button").attr("disabled", true);
                    }else{
                        if(password3 === password1){
                            $("#bd3").html("新密码与原密码相同");
                            $("#button").attr("disabled", true);
                        }else{
                            if(aa == 'ok'){
                                $("#button").removeAttr("disabled");
                            }else{
                                $("#button").attr("disabled", true);
                            }
                        }
                    }
                }
            });
            $("#button").click(function(){
                var id = "{{ session("username") }}";
                var password = $("#password3").val();
                var ypassword = $("#bd").val();
                if(confirm("你确定修改密码吗?")){
                    if(aa == 'ok'){
                        $.ajax({
                            url:'/Modifypass',
                            type:'post',
                            async:true,
                            data:{id:id,password:password},
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(data){
                                if(data === 'y'){
                                    //关闭修改密码窗口
                                    $("#ok").removeClass().addClass("common-dialog trans scale50 op0"); 
                                    $("button").html("修改中请稍等");
                                    //窗口关闭网页模糊不能点 刷新页面
                                    //document.body.innerHTML=xmlhttp.responseText
                                    setTimeout(function(){
                                        //settime(obj)
                                        location.reload();
                                    },500)
                                }else{
                                    $("#bd3").html("新密码与原密码相同");
                                    
                                }
                            },
                            error:function(){
                                    alert('网站错误请联系管理员2');
                            }
                        })
                    }else{
                        $("#bd3").html("原密码认证错误请重新输入");
                    }
                }
           });
        </script>
        <!-- Baidu Analytics -->


    </body>
</html>
