<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
        <meta name="description" content="" />
        <meta name="viewport" content="user-scalable=no">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="google-site-verification" content="BstJA3X9z6f9HcvoN9AZTwaKo_9Abj_j7dVBPfy640s" />
        <meta name="baidu-site-verification" content="IYCrtVH0i1" />
        <meta property="wb:webmaster" content="239d3d1dbdde1b2c" />
        <link rel="icon" type="image/png" href="images/favicon.ico"/>
        <script src="<?php echo e(asset('Shop/js/jquery-1.8.3.min.js')); ?>"></script>
        <!-- kefuQQ -->
                <style type="text/css">
                * { padding: 0; margin: 0; font-size: 12px; }
                    body{height:2000px;} 
                ul { list-style: none; }
                a { text-decoration: none; }
                </style>
                <link rel="stylesheet" href="Shop/css/kefu.css">   
                <script src="Shop/js/jquery.js"></script>
                <!-- kefu QQ-->
        <script type="text/javascript">

            (function(document, screen) {if (screen.width < 760) {document.location.href="/mobile/";}}(document, screen));
        </script>

        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/common.css')); ?>"/>

        <link rel="stylesheet" href="<?php echo e(asset('Shop/css/checkout.css')); ?>"/>

        <!--[if lte IE 7]><script>window.onload=function(){location.href="/ie6warning/"}</script><![endif]-->
        <!--[if lt IE 9]>
        <script src="<?php echo e(asset('Shop/js/respond.js')); ?>"></script>
        <script>
            var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video, dh-dialog, dh-checkbox".split(', ');
             var i= e.length;while (i--){document.createElement(e[i])}
        </script>
        <![endif]-->
        <title>下订单</title>
    </head>
    <body class="day " ng-controller="bodyCtrl"  day-or-night>
        
        <section class="common-back" id="wrapBackground">

                <header id="header">
                    <div class="common-width clearfix">
                        <h1 class="fl">
                            <a class="logo base-logo" href="/">外卖超人</a>
                        </h1>
                        <?php if(!session('username')): ?>
                            <ul class="member logging" ng-init="loginInfo=true">
                                <li><a href="/" class="index">首页</a></li>
                                <li class="userName">
                                    <a href="<?php echo e(URL('/member_index')); ?>" rel="nofollow" draw-user>18005151538<em></em></a>
                                    <div>
                                        <p><a href="<?php echo e(URL('/member_index')); ?>"  rel="nofollow">账号管理</a></p>
                                        <p><a href="<?php echo e(URL('/member_addr')); ?>"  rel="nofollow">地址管理</a></p>
                                        <p class="no-bo"><a id="logout" href="/account/logout/" referer-url rel="nofollow">退出</a></p>
                                    </div>
                                </li>
                                <li class=""><a href="<?php echo e(URL('/member_order')); ?>" class="order-center"  rel="nofollow">我的订单</a></li>
                                <li class=""><a href="<?php echo e(URL('/member_collect')); ?>"  rel="nofollow">我的收藏</a></li>
                                <li class=""><a href="<?php echo e(URL('/gifts')); ?>"  rel="nofollow">氪星礼品站</a></li>
                                <li class="phone-client "><a href="/app/"  rel="nofollow" target="_blank"><span>手机客户端</span></a></li>
                            </ul>
                        <?php else: ?>
                            <ul id="member" class="member" login-box>
                                 <?php if(empty(session("username"))): ?>
                                <li><a href="shop_list?id=<?php echo e($_GET['id']); ?>" class="index">首页</a></li>
                                <li class="login-register">
                                    <a href="/login?id=<?php echo e($_GET['id']); ?>&status=1"  class="login"  >登录</a>
                                    <span class="cg">/</span><a href="/login?id=<?php echo e($_GET['id']); ?>&status=2"  class="register">注册</a></li>
                                <?php else: ?>
                                <li class="userName">
                                        <a href="/member_index?id=<?php echo e($_GET['id']); ?>" draw-user><?php echo e(session("username")); ?><em></em></a>
                                        <div>
                                                <p><a href="/member_index?id=<?php echo e($_GET['id']); ?>" >账号管理</a></p>
                                                <p><a href="/member_addr?id=<?php echo e($_GET['id']); ?>" >地址管理</a></p>
                                                <p class="no-bo"><a  href="#" onclick="exit()">退出</a></p>
                                        </div>
                                </li>
                                <li><a href="/member_order?id=<?php echo e($_GET['id']); ?>" class="order-center" >查看订单</a></li>
                                <li class=""><a href="/member_collect?id=<?php echo e($_GET['id']); ?>" >我的收藏</a></li>
                                <li class=""><a  href="#" onclick="exit()">退出</a></li>
                            <?php endif; ?>
				<input type="hidden" value="<?php echo e($_GET['id']); ?>" id="hidden">
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
		                                    	location.reload('');
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
                        <?php endif; ?>
                    </div>
                </header>

            <div id="main-box">
                 <!--二维码-->
                <div class="qrCode-frame" ng-hide="qrCodeStatus">
                    <img src="<?php echo e(asset('Shop/images/wx.png')); ?>" alt="扫描二维码" />
                    <em ng-click="qrCodeStatus=true">X</em>
                </div>

                <div ng-controller="colorAction">
                    <div class="dayColor_two"></div>
                    <div class="dayColor_one"></div>
                    <div class="dayColor_three" ng-class="{dayColor_threeActive:threeActive}"></div>
                </div>


            <section class="checkout-main common-width">
                    <header class="brtrl">送餐信息 (*为必填项)</header>
                    <section class="user-info">
                <ul class="user-address-list clearfix disnone" ng-class="{disblock: userAddressList.length != 0}">
                    <li ng-repeat="item in userAddressList" ng-class="{active:item.active,userAddressHover:mobileAny}" ng-click="changeActiveAddress($index)" class="user-address-item fl">
                        <div class="clearfix">
                            <h3 class="fl" ng-bind="item.customer_name"></h3>
                            <div type="hidden" id="id" style="display:none" ng-bind="item.id"></div>
                            <span class="fr"><a href="javascript:;" ng-click="updateUserAddress($index);$event.stopPropagation();" class="link">修改</a></span>
                             <span class="fr"><a href="javascript:;" id="delid" ng-click="deleteUserAddress($index);$event.stopPropagation();" class="link">删除</a></span>
                            <!--<span class="fr"><a href="javascript:;" id="delid"  class="link">删除</a></span>-->
                        </div>
                        <p class="user-address" ng-bind="item.delivery_address"></p>
                        <p class="user-phone" ng-bind="item.customer_phone"></p>
                    </li>



                    <li ng-if="userAddressList.length > 0 && userAddressList.length < 8" class="user-address-item address-add-box fl">
                        <div ng-click="addUserAddress()"><i>+</i>使用新地址</div>
                    </li>
                </ul>
                    <form novalidate="true" name="orderForm" class="order-form inline">
                    <div ng-show="userAddressList.length == 0">
                        <div class="form-group row mb10">
                            <label class="require col-2">收单人：</label>
                            <div class="col-8">
                                <input type="text" required ng-blur="orderForm.name.blur=true" ng-focus="orderForm.name.blur=false" maxlength="10"
                                       ng-class="{error:(orderForm.submit || orderForm.name.blur) && orderForm.name.$invalid}" name="name" placeholder="您的称呼" ng-model="name">
                            </div>
                            <div class="col-8 col-offset-2 disnone" ng-class="{disnone : !((orderForm.submit && orderForm.name.$invalid) || (!orderForm.submit && orderForm.name.blur && orderForm.name.$invalid))}">
                                <span class="vaildate-error">称呼不能为空</span>
                            </div>
                        </div>
                        <div class="form-group row mb10">
                            <label class="require col-2">手机号码：</label>
                            <div  class="col-8">
                                <input type="text" maxlength="11" ng-blur="orderForm.contact.blur=true" ng-focus="orderForm.contact.blur=false" required mobile
                                       ng-class="{error:(orderForm.submit || orderForm.contact.blur) && orderForm.contact.$invalid}" name="contact" placeholder="您的联系方式" ng-model="phone">
                            </div>
                            <div class="col-8 col-offset-2 disnone" ng-class="{disnone: !((orderForm.submit || orderForm.contact.blur) && orderForm.contact.$error.required)}">
                                <span class="vaildate-error">联系方式不能为空</span>
                            </div>
                            <div class="col-8 col-offset-2 disnone" ng-class="{disnone: !(orderForm.contact.blur && orderForm.contact.$error.mobile&&!orderForm.contact.$error.required)}">
                                <span class="vaildate-error">请输入正确的11位手机号码</span>
                            </div>
                        </div>
                        <div class="form-group row mb10">
                            <label class="require col-2">送餐地址：</label>
                            <div class="col-8">
                                <input type="text" required ng-blur="orderForm.address.blur=true" ng-focus="orderForm.address.blur=false"
                                       ng-class="{error:(orderForm.submit || orderForm.address.blur) && orderForm.address.$invalid}" name="address" placeholder="详细地址，如武定西路1189号606室" ng-model="address">
                            </div>
                            <div class="col-8 col-offset-2 disnone" ng-class="{disnone: !((orderForm.submit && orderForm.address.$invalid) || (!orderForm.submit && orderForm.address.blur && orderForm.address.$invalid))}">
                                <span class="vaildate-error">送餐地址不能为空</span>
                            </div>
                        </div>
                    </div>
                                    <div class="form-group row mb10">
                                            <label class="col-2">送餐时间：</label>
                                            <dh-select class="col-8" data="selectObj" selectedindex="datetimeIndex"></dh-select>
                                    </div>
                    <div class="form-group row mb10 relative">
                        <label class="col-2">支付方式：</label>

                        <dh-radio class="col-2" model="payType" value="0" title="餐到付款"></dh-radio>
                        <em ng-init="payType=0"></em>
                    </div>
                            <div class="form-group row mb10">
                                    <label class="col-2">备注信息：</label>
                                    <div class="col-8">
                                            <input type="text" maxlength="150" placeholder="如：多米饭，不吃辣等口味需求" ng-model="comment">
                                    </div>
                            </div>
                        
                    </form>
                        <div>* 请填写当前范围内的地址：<?php echo e(session('dizhi')); ?></div> 
                        <br><hr><br >
                        <button  ng-disabled="!(name && phone && address&&couponCheck&&commitCheck)" ng-click="commitOrder()" class="btn btn-success fs20">提交信息 <i class="icon arrows-right"></i></button>
                        </hr>
                    </section>
                    <header>订单内容</header>
                    <section>
                            <div class="toggle-order-info" accordion>
                                    <a href="javascript:;">展开订单详情 <i class="icon arrows-s-down"></i></a>
                            </div>
                            <div class="order-info">
                                
                                <div class="order-thead clearfix">
                                    <div class="goods-name">商品</div>
                                    <div class="goods-count">份数</div>
                                    <div class="goods-price">单价</div>

                                    <div class="goods-total">小计</div>
                                </div>
                                <div class="order-body">

                                    <div class="order-item clearfix">
                                        <?php $__currentLoopData = $dds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ds): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="goods-name cai"><?php echo e($ds['name']); ?></div>
                                        <div class="goods-count fen"><?php echo e($ds['q']); ?></div>
                                        <div class="goods-price danjia">￥<?php echo e($ds['p']); ?></div>
                                        <div class="goods-total heji">￥<?php echo e($ds['p']*$ds['q']); ?></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>

                                </div>
                            </div>
                    </section>
                    <section class="total-sum">
                        <?php $__currentLoopData = $mo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <p class="tr fs14">订单金额： <span>￥<?php echo e($m); ?></span></p>
                            <!--<p ng-if="isVaildateCouponSuccess" class="tr fs14">优惠券： <span ng-bind="couponMoney|number:2|currency:'￥-'"></span></p>-->
                            <p class="tr fs14">配送费用： <span>￥0.00</span></p>
                            <p class="tr fs17 pink">需要付款： <b>￥<span ng-init="orderTotal=<?php echo e($m); ?>" ng-bind="orderTotal|number:2"></span></b></p>
                            <p class="tr last">
                                
                                <a href="/shop_detail?bid=<?php echo e($_GET['bid']); ?>&id=<?php echo e($_GET['id']); ?>" class="fs15 link"><i class="icon arrows-left"></i> 返回修改订单</a>
                                
                                <button ng-disabled="!(name && phone && address&&couponCheck&&commitCheck)" id="aaaa"  class="btn btn-success fs20">提交订单<i class="icon arrows-right"></i></button>
                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </section>
            </section>

            </div>
        </section>
        <script type="text/javascript">
            $('#aaaa').click(function(){
                $.ajax({
                        url:'/ord',
                        type:'post',
                        async:true,
                        data:{},
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success:function(data){
                            if(data == 'y'){
                                //Ajax请求成功返回“Y” 页面跳转/order
                                  window.location.href="/order_success";
//                                alert('111');
                            }
                        },
                        error:function(){
                            alert('失败');
                        }
                })
            })
        </script>

            <footer id="footer">
            <div class="footer-first gray">
                <div class="company-info clearfix fs14 gray">
                    <a href="<?php echo e(URL('/about')); ?>" target="_blank"  rel="nofollow">关于我们</a>
                    <a href="<?php echo e(URL('/help')); ?>" target="_blank"  rel="nofollow">帮助中心</a>
                    <a href="/terms-and-conditions/" target="_blank"  rel="nofollow">法律声明</a>
                    <a href="<?php echo e(URL('/jobs')); ?>" target="_blank"  rel="nofollow">人才招聘</a>
                    <a href="<?php echo e(URL('/contact')); ?>" target="_blank"  rel="nofollow">联系我们</a>
                    <a href="javascript:;" user-feedback ng-click="userFeedback=true" class="last" rel="nofollow">意见反馈</a>
                    <a href="/restaurant/list/shanghai/1/" class="last" target="_blank" style="display:none">上海餐厅导航</a>
                </div>
            </div>
            <div class="footer-last">
                <a target="_blank" class="foot-logo-1 base-logo" href="/"></a>
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


    <dh-dialog class="disnone" type='login' height="500" header="登录" show="loginShow" >
        <form class="login-form" novalidate name="loginForm" ng-controller="loginCtrl">
            <div class="form-group">
                <label for="">手机号码</label>
                <div>
                    <input type="text" ng-model="user.username" ng-class="{error:user.usernameMessage}" ng-focus="user.usernameMessage=''" maxlength="11" placeholder="请输入你的手机号码" />
                    <span class="vaildate-error" ng-if="user.usernameMessage">
                        <span ng-bind="user.usernameMessage"></span>
                    </span>
                    <span class="vaildate-error" ng-if="user.isLogined">
                        该手机号码尚未注册！<a href="javascript:;" ng-click="locationRegister()" class="link">立即注册</a>
                    </span>
                </div>
            </div>
            <div class="form-group mb10">
                <label for="">登录密码</label>
                <div>
                    <input type="password" onpaste="return false" ng-model="user.password" ng-focus="user.passwordMessage=''"  ng-class="{error:user.passwordMessage}" maxlength="10" placeholder="请输入登录密码" />
                    <span class="vaildate-error" ng-if="user.passwordMessage">
                        <span ng-bind="user.passwordMessage"></span>
                    </span>
                </div>
            </div>
            <div ng-init="showCaptcha=0" ng-if="showCaptcha" class="form-group inline clearfix mb10">
                <div class="fl w50p">
                    <input type="text" ng-model="user.captcha" ng-focus="user.captchaMessage=''"  ng-class="{error:user.captchaMessage}" placeholder="请输入验证码">
                    <span class="vaildate-error" ng-if="user.captchaMessage">
                        <span ng-bind="user.captchaMessage"></span>
                    </span>
                </div>
                <label class="fr">
                    <dh-captcha change="captchaChange" src="/captcha/"></dh-captcha>
                </label>
            </div>
            <div class="clearfix mb10">
                <dh-checkbox model="user.rememberme" title="记住我" class="fl"></dh-checkbox>
                <a href="/account/password/reset_via_mobile/" target="_blank" class="fs12 fr link">忘记密码</a>
            </div>
            <button class="big-btn btn-green btn mb10" ng-click="loginVaildate()" ng-disabled="loginBtnDisabled" ng-bind="loginBtn"></button>
            <div class="clearfix">
                <span class="fr fs12">
                    没有账号?
                    <a href="javascript:void(0)" ng-click="locationRegister()" class="link">立即注册</a>
                </span>
            </div>
        </form>
    </dh-dialog>
    <dh-dialog class="disnone" type='register' height="500" header="注册" show="registerShow" >
        <form ng-controller="registerCtrl" class="register-form" name="registerForm">
            <div class="form-group mb10">
                <label for="">手机号码</label>
                <div>
                    <input type="text" ng-class="{error:user.usernameMessage}" maxlength="11" placeholder="请输入您的手机号码" ng-model="user.username"/>
                    <span class="vaildate-error" ng-if="user.usernameMessage">
                        <span ng-bind="user.usernameMessage"></span>
                    </span>
                    <span class="vaildate-error" ng-if="user.isRegistered">
                        该手机号码已经注册！<a href="javascript:;" ng-click="locationLogin()" class="link">立即登录</a>
                    </span>
                </div>
            </div>



            <div class="form-group captcha-wrap">
                <div class="clearfix captcha-box">
                    <div class="fl form-group captcha-item">
                        <div class="fl w50p">
                            <input type="text" ng-class="{error:user.captchaMessage}" ng-focus="user.captchaMessage=''" placeholder="请输入验证码" ng-model="user.captcha" />
                            <span class="vaildate-error" ng-if="user.captchaMessage">
                                <span ng-bind="user.captchaMessage"></span>
                            </span>
                        </div>
                        <button class="fs12 fr w40p btn btn-pink" ng-click="getCaptcha()" ng-disabled="captchaDisabled" ng-bind="captchaVal"></button>
                    </div>
                    <div class="fl form-group captcha-item">
                        <div class="fl w50p">
                            <input type="text" ng-model="user.imgCaptcha" maxlength="4" ng-disabled="imgCaptchaIsDisabled" ng-class="{error:user.imgCaptchaMessage}" placeholder="请输入验证码">
                            <span class="vaildate-error" ng-if="user.imgCaptchaMessage">
                                <span ng-bind="user.imgCaptchaMessage"></span>
                            </span>
                        </div>
                        <label class="fr">
                            <dh-captcha style="width:119px;height:34px;" change="captchaImgChange" src="/captcha/"></dh-captcha>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group mb10">
                <label for="">登录密码</label>
                <div><input type="password" ng-class="{error:user.passwordMessage}" ng-focus="user.passwordMessage=''"  maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password" />
                    <span class="vaildate-error" ng-if="user.passwordMessage">
                        <span ng-bind="user.passwordMessage"></span>
                    </span>
                </div>
            </div>
            <div class="form-group mb10">
                <div><input type="password" ng-class="{error:user.password2Message}" ng-focus="user.password2Message=''" maxlength="10" onpaste="return false" placeholder="输入登录密码 6-10个字符" ng-model="user.password2"/>
                    <span class="vaildate-error" ng-if="user.password2Message">
                        <span ng-bind="user.password2Message"></span>
                    </span>
                </div>
            </div>
            <div class="clearfix mb10">
                <dh-checkbox model="user.remember" title="我同意外卖超人" class="fl"></dh-checkbox>
                <a href="/terms-and-conditions/" target="_blank" class="fs12 fl link"> " 注册条款 "</a>
            </div>
            <button ng-disabled="!user.remember || registerBtnDisabled" ng-click="registerVaildate()" class="big-btn btn-green btn mb10" ng-bind="registerBtn"></button>
        </form>
    </dh-dialog>
    <script>
        var common_sms_code = '/ajax/common_sms_code/';
        var ajax_customer_user_register_start = '/ajax/customer_user_register_start/';
        var common_validate_sms_code= '/ajax/common_validate_sms_code/';
        var ajax_customer_user_register_register = '/ajax/customer_user_register_register/';
    </script>

        <dh-loading show="showFullLoading"></dh-loading>
        <dh-dialog class="disnone" index="1001" header="超人小提示" show="showError">
            <div class="alert-box error">
                <p ng-bind="errorMsg"></p>
            </div>
             <div class="errorBtn">
                    <button class="btn btn-success small-btn" ng-click="errorConfirm()">确认</button>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" header="短信校验" show="msgReg">
            <div class="form-group row mb20 msgText">
               验证码已发送到您的手机 <span ng-bind="msgPhone" class="cf90"></span>
            </div>
            <div class="form-group row mb20 clearfix">
                <div class="fl w185">
                    <input type="text" ng-class="{error:msg.captchaMessage}" ng-focus="msg.captchaMessage=''" placeholder="请输入验证码" ng-model="msg.captcha" maxlength="6" />
                    <span class="vaildate-error" ng-if="msg.captchaMessage">
                        <span ng-bind="msg.captchaMessage"></span>
                    </span>
                </div>
                <button class="fs12 fr w40p btn btn-pink" ng-click="getMsgCaptcha()" ng-disabled="msgCaptchaDisabled" ng-bind="msgCaptchaVal"></button>
            </div>
            <div class="errorBtn">
                <button class="btn btn-success normal-btn" ng-click="submitMsg()" ng-disabled="msg.captcha.length != 6">确认</button>
            </div>
        </dh-dialog>
        <dh-dialog class="disnone" index="1001" header="超人小提示" show="confirm">
            <div class="alert-box warning">
                <p ng-bind="confirmMsg" class="mb10"></p>
            </div>
            <div class="errorBtn">
                    <button class="btn btn-success small-btn" ng-click="submitConfirm()">确认</button>
                    <button class="btn btn-cancel small-btn" ng-click="cancelConfirm()">取消</button>
                </div>
        </dh-dialog>
<!--        <dh-dialog class="disnone" type="alert" index="1001" header="" show="couponConfirm">
            <div class="coupon-confirm">
                <p class="mb10 errorTip" ng-bind="couponConfirmMsg"></p>
                <button class="btn btn-success couponConfirm-btn" id="aaa" ng-click="submitcouponConfirm()">不使用优惠劵直接下单</button>
            </div>
        </dh-dialog>-->
        <!-- 使用新收件地址 -->
        <dh-dialog class="disnone" header="使用新地址/修改地址" width="420" show="editUserAddress">
            <div ng-controller="userAddressCtrl">
                <form novalidate="true" name="userAddressForm" class="address-from">
                <div class="form-group row mb20">
                    <label class="require col-3">收单人：</label>
                    <div class="col-8">
                        <input type="text" required maxlength="10"
                               ng-class="{error:userAddressForm.submit && userAddressForm.name.$invalid}" name="name"
                               placeholder="您的称呼" ng-model="userAddress.customer_name">
                    </div>
                    <div class="col-8 col-offset-3" ng-if="userAddressForm.submit && userAddressForm.name.$invalid">
                        <span class="vaildate-error">称呼不能为空</span>
                    </div>
                </div>
                <div class="form-group row mb20">
                    <label class="require col-3">手机号码：</label>
                    <div class="col-8">
                        <input type="text" maxlength="11" required mobile
                               ng-class="{error:userAddressForm.submit && userAddressForm.contact.$invalid}" name="contact"
                               placeholder="您的联系方式" ng-model="userAddress.customer_phone">
                    </div>
                    <div class="col-8 col-offset-3" ng-if="userAddressForm.submit && userAddressForm.contact.$error.required">
                        <span class="vaildate-error">联系方式不能为空</span>
                    </div>
                    <div class="col-8 col-offset-3" ng-if="userAddressForm.submit && !userAddressForm.contact.$error.required && userAddressForm.contact.$error.mobile">
                        <span class="vaildate-error">请输入正确的11位手机号码</span>
                    </div>
                </div>
                <div class="form-group row mb30">
                    <label class="require col-3">送餐地址：</label>
                    <div class="col-8">
                        <input type="text" required
                               ng-class="{error:userAddressForm.submit && userAddressForm.address.$invalid}" name="address"
                               placeholder="详细地址，如武定西路1189号606室" ng-model="userAddress.delivery_address">
                    </div>
                    <div class="col-8 col-offset-3" ng-if="userAddressForm.submit && userAddressForm.address.$invalid">
                        <span class="vaildate-error">送餐地址不能为空</span>
                    </div>
                </div>
                    
                <div class="form-group tc">
                    <button class="btn btn-success normal-btn" ng-click="submitUserAddress()">确认</button>
                    <button class="btn btn-cancel normal-btn" ng-click="cancelUserAddress()">取消</button>
                </div>
            </form>
            </div>
        </dh-dialog>
        <!-- 使用新收件地址 -->
         <ul class="site-fixed">
            <li class="scroll-top"><img src="<?php echo e(asset('Shop/images/scroll_top1.png')); ?>" alt=""/> </li>
            <li class="scorll-feekback" ng-click="userFeedback=true">
                <img src="<?php echo e(asset('Shop/images/scorll_feekback.png')); ?>" alt=""/>
                <div>意见反馈</div>
            </li>
            <li class="scroll-wx">
                <img src="<?php echo e(asset('Shop/images/scroll_wx.png')); ?>" alt=""/>
                 <div><img src="<?php echo e(asset('Shop/images/wx.png')); ?>" alt=""/></div>
            </li>
        </ul>

        <script type="text/javascript" src="<?php echo e(asset('Shop/js/angular.min.js')); ?>"></script>
        <script src="<?php echo e(asset('Shop/js/common.js')); ?>"></script>
        <!--<script src="<?php echo e(asset('Shop/js/jquery-1.8.3.min.js')); ?>"></script>-->

        <script src="<?php echo e(asset('Shop/js/service.js')); ?>"></script>

        <script>var feedbackUrl = '/ajax/feedback/';var app = angular.module("app", ["dh.dialog", "dh.form", 'dh.service', 'dh.other']);</script>
        <!--[if lt IE 9]><script src="<?php echo e(asset('Shop/js/fix.js')); ?>"></script><![endif]-->
        

        <script>
            var check_coupon_url = "/ajax/check_coupon_code/";
            //送货地址url
            var place_order_url = "/songhuodizhi";
            var confirm_url = "/confirm/0/";
            var online_pay = "/account/order/0/online_pay/";
            //添加收货地址
            var ajax_add_delivery_address = "/add";
            var ajax_add_all_delivery_addresses = "/ajax/delivery_address/add_all/";
            //删除收货地址
            var ajax_del_delivery_addres = "/del?id=/0/";
            //修改收货地址url
            var ajax_update_delivery_address = "/update";
            var ajax_common_sms_code = "/ajax/common_sms_code/";
            var ajax_is_order_need_sms_validate = "/tijiao";
            var ajax_common_validate_sms_code = "/ajax/common_validate_sms_code/";
            var av = parseInt(Math.random()*999999+1);
            var orderId = '520'+av;
            var grid_locationId = '602341';
            var restaurantId = '1019';
            var gaObj = {
                restaurantName : '吉祥馄饨 (高安路店)',
                order_total : '32.00',
                main_cuisine : 'DrinkSnack',
                orderId : '3788798',
                delivery_fee : '0.00'
            };
            var cart_items_json=[{"name": "\u86cb\u9ec4\u867e\u4ec1\u9984\u9968\u5341\u53ef\u53e3\u53ef\u4e50\u4e00\u74f6", "price": 22.00, "id": 2236070, "additions": [{"total_price": -12.00, "price": -6.00, "quantity": 2, "id": 8168, "name": "\u70b9\u6211\u5440\uff0c\u51cf6\u5143 \uff01"}], "options": [], "quantity": 2}];
            var selectObj = [];
            var userAddress = [];
            var _isAuthenticated = 'ajax';
            var setLastAddrUrl =  "/l";
            var lastUsedAddressId = '230901';
            <?php $__currentLoopData = $site; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                userAddress.push({
                    customer_name: "<?php echo e($s->name); ?>",
                    delivery_address: "<?php echo e($s->address); ?>",
                    customer_phone: '<?php echo e($s->phone); ?>',
                    id: '<?php echo e($s->id); ?>'
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

            selectObj.push({id:'no',text:'即时送出',date:'2015-05-03'});
            selectObj.push({id:'10:30',text:'10:30',date:'2015-05-03'});selectObj.push({id:'11:00',text:'11:00',date:'2015-05-03'});selectObj.push({id:'11:30',text:'11:30',date:'2015-05-03'});selectObj.push({id:'12:00',text:'12:00',date:'2015-05-03'});selectObj.push({id:'12:30',text:'12:30',date:'2015-05-03'});selectObj.push({id:'13:00',text:'13:00',date:'2015-05-03'});selectObj.push({id:'13:30',text:'13:30',date:'2015-05-03'});selectObj.push({id:'14:00',text:'14:00',date:'2015-05-03'});selectObj.push({id:'14:30',text:'14:30',date:'2015-05-03'});selectObj.push({id:'15:00',text:'15:00',date:'2015-05-03'});selectObj.push({id:'15:30',text:'15:30',date:'2015-05-03'});selectObj.push({id:'16:00',text:'16:00',date:'2015-05-03'});selectObj.push({id:'16:30',text:'16:30',date:'2015-05-03'});selectObj.push({id:'17:00',text:'17:00',date:'2015-05-03'});selectObj.push({id:'17:30',text:'17:30',date:'2015-05-03'});selectObj.push({id:'18:00',text:'18:00',date:'2015-05-03'});selectObj.push({id:'18:30',text:'18:30',date:'2015-05-03'});selectObj.push({id:'19:00',text:'19:00',date:'2015-05-03'});selectObj.push({id:'19:30',text:'19:30',date:'2015-05-03'});selectObj.push({id:'20:00',text:'20:00',date:'2015-05-03'});selectObj.push({id:'20:30',text:'20:30',date:'2015-05-03'});selectObj.push({id:'21:00',text:'21:00',date:'2015-05-03'});
        </script>
        <script src="<?php echo e(asset('Shop/js/checkout.js')); ?>"></script>
        <script>
            (function(){var b=document.createElement;var a=0;var e=/www[.]google-analytics[.]com/i;var h;function d(j,k,i){if(j.addEventListener){j.addEventListener(k,i,false)}else{if(j.attachEvent){j.attachEvent("on"+k,i)}else{j["on"+k]=i}}}function g(j,k,i){if(j.removeEventListener){j.removeEventListener(k,i,false)}else{if(j.detachEvent){j.detachEvent("on"+k,i)}else{j["on"+k]=null}}}function c(j,l){function i(m){a+=1;d(m,"error",l);d(m,"load",l)}var k=window.MutationObserver||window.WebKitMutationObserver||false;if(!!k){j._observer=new k(function(m){m.forEach(function(n){if(n.attributeName=="src"&&e.test(n.target.src)){i(n.target)}})});j._observer.observe(j,{attributes:true,childList:false,characterData:false})}else{if(j.addEventListener){j._DOMAttrModified=function(m){if(m.attrName=="src"&&e.test(m.target.src)){i(m.target)}};j.addEventListener("DOMAttrModified",j._DOMAttrModified)}else{if(j.attachEvent){j._onpropertychange=function(m){if(m.propertyName=="src"&&e.test(m.srcElement.src)){i(m.srcElement)}};j.attachEvent("onpropertychange",j._onpropertychange)}}}}function f(i,k){var j=window.MutationObserver||window.WebKitMutationObserver||false;if(!!j){i._observer.disconnect();delete i._observer}else{if(i.addEventListener){i.removeEventListener("DOMAttrModified",i._DOMAttrModified);delete i._DOMAttrModified}else{if(i.attachEvent){i.detachEvent("onpropertychange",i._onpropertychange);delete i._onpropertychange}}}g(i,"error",k);g(i,"load",k);a-=1;if(a<=0&&h){h();h=null}}document.createElement=function(i){element=b.call(document,i);if(i.toLowerCase()=="img"){var j=function(k){f(k.target||k.srcElement,j)};c(element,j)}return element};this.ga_synchronize=function(i){h=i}}());
        </script>


        <script>angular.bootstrap(document, ["app"]);</script>

        <!-- Baidu Analytics -->
        <!-- QQ客服 -->
		<div id="box-kefu">
                    <div class="kefu-close"></div>
                    <div class="kefu-open">
                        <div>
                        <ul>
                            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1531555719&site=qq&menu=yes" target="_blank"><i class="qq"></i>在线客服</a></li>
                            <li><a href="http://wpa.qq.com/msgrd?v=3&uin=1030985069&site=qq&menu=yes" target="_blank"><i class="qq"></i>在线客服</a></li>
                            <!--<li><a href="http://www.97zzw.com/plus/guestbook.php#liuyan" target="_blank"><i class="txt"></i>咨询留言</a></li>-->
                        </ul>
                        </div>
                        <a href="javascript:;" class="close">关闭</a>
                    </div>
                </div>
        <!-- -->
                
        <script>var online= new Array();</script>
                <script src="http://webpresence.qq.com/getonline?Type=1&645481746:1712816412:645481746:"></script>
                <script>
                (function($){
                    for (var i=0; i<online.length; i++) {
                        if (online[i]) jQuery("#box-kefu .qq").eq(i).addClass("online");
                    }
                    var _open = $("#box-kefu").find(".kefu-open"),
                        _close = $("#box-kefu").find(".kefu-close");
                    _open.find("a").hover(function(){
                        $(this).stop(true,true).animate({paddingLeft:20},200).find("i").stop(true,true).animate({left:75},200);
                    },function(){
                        $(this).stop(true,true).animate({paddingLeft:35},200).find("i").stop(true,true).animate({left:10},200);
                    });


                    _open.find(".close").click(function(){
                        _open.animate({width:148},200,function(){
                            _open.animate({width:0},200,function(){
                                _close.animate({width:34},200);

                            });
                        });
                    });
                    _close.click(function(){
                        _close.animate({width:44},200,function(){
                            _close.animate({width:0},200,function(){
                                _open.animate({width:138},200);
                            });
                        });
                    });
                })(jQuery)
                </script>        
    </body>
</html>
