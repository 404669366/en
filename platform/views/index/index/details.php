<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>details</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/mag.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入details样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/details.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <!--引入jquery-->
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/top.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/mag.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/map.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/slide.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/login.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/eye.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/submit.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<? \vendor\helpers\Msg::run('PopupMsg') ?>
<?php if ($basisData['isGuest']): ?>
    <div class="loninContaner">
        <div class="login_bg" style="display: none"></div>
        <!--longin-form1-->
        <div class="login_form login_forms doLoginTel" style="display: none">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">手机快捷登录</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="text" class="inputs top_border loginTel" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li style="position: absolute">
                        <input type="text" class="inputs btm_border loginTelCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a telLoginClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.telLoginClick',
                            telModel: '.loginTel'
                        });
                    </script>
                    <li class="li_btn">
                        <button type="button" class="loginTelUp" style="margin-top: 71px">登录</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink toPwdLogin">账号密码登录</span>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.loginTelUp',
                        url: '/login/login/login-t.html',
                        params: ['loginTel', 'loginTelCode'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--账号密码登录longin-form3-->
        <div class="login_form login_forms doLoginPwd" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">账号密码登录</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="tel" class="inputs top_border num loginPTel" maxlength="11" placeholder="请输入手机号">
                    </li>

                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="password" class="inputs btm_border pwd" minlength="8" placeholder="请输入登录密码">
                    </li>
                    <li class="forget_pwd">
                        <span class="toRetrieve">忘记密码</span>
                    </li>
                    <li class="forget_btn">
                        <button type="button" class="loginPClick">登录</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink toTelLogin">手机快捷登录</span>
                        <p>登录即代表同意
                            <a href="#">《亿能隐私政策》</a>
                            及
                            <a href="#">《亿能用户服务协议》</a>
                        </p>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.loginPClick',
                        url: '/login/login/login-p.html',
                        params: ['loginPTel', 'pwd'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--找回密码longin-form4-->
        <div class="login_form login_forms doRetrieve" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">找回密码</p>
                <p class="login_a"></p>
                <ul class="log_input submit">
                    <li>
                        <input type="text" class="inputs top_border reLoginTel" maxlength="11" placeholder="请输入手机号">
                    </li>
                    <li style="position: relative">
                        <input type="text" class="inputs reLoginCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a reLoginClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.reLoginClick',
                            telModel: '.reLoginTel'
                        });
                    </script>
                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="text" class="inputs btm_border reLoginPwd" minlength="8"
                               placeholder="请输入新密码  (最少8位数字或字母)">
                    </li>
                    <li class="change_btn">
                        <button type="button" class="modify reLoginUp" style="margin-top: 24px">修改密码</button>
                    </li>
                    <li class="foot_link">
                        <span class="alink backTelLogin">返回登录</span>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.reLoginUp',
                        url: '/login/login/login-r.html',
                        params: ['reLoginTel', 'reLoginCode', 'reLoginPwd'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
        <!--手机号码注册longin-form2-->
        <div class="login_form doRegister" style="display: none;">
            <!--login-content-->
            <div class="loginCont">
                <!--close-->
                <i class="fa fa-times" aria-hidden="true"></i>
                <p class="login_tit float_left">注册账号</p>
                <p class="login_rtxt">已有账号？<span class="toPwdLogin">去登录</span></p>
                <ul class="log_input submit">
                    <li>
                        <input type="tel" class="inputs top_border registerTel" placeholder="请输入手机号">
                    </li>
                    <li style="position: relative">
                        <input type="text" class="inputs registerCode" maxlength="6" placeholder="请输入短信验证码">
                        <div class="inpt_a registerClick">获取验证码</div>
                    </li>
                    <script>
                        sms({
                            click: '.registerClick',
                            telModel: '.registerTel'
                        });
                    </script>
                    <li class="eye" style="position: relative">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <input type="password" class="inputs btm_border registerPwd" minlength="8"
                               placeholder="请输入密码  (最少8位数字或字母)">
                    </li>
                    <li class="check_btn">
                        <label class="checkbox-btn">
                            <span class="active">
                                <input type="checkbox" class="ckbtn registerOk" value="1">
                            </span>
                            我已阅读并同意
                        </label>
                        <a href="#">《亿能用户使用协议》</a>
                        及
                        <a href="#">《亿能用户服务协议》</a>
                    </li>
                    <li class="register_btn">
                        <button type="button" class="up">注册</button>
                    </li>
                </ul>
                <script>
                    submit({
                        click: '.up',
                        url: '/login/login/register.html',
                        params: ['registerTel', 'registerCode', 'registerPwd', 'registerOk'],
                        callBack: function (data) {
                            window.location.reload();
                        }
                    });
                </script>
                <!--清除浮动-->
                <div class="clear"></div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!--banner start-->
<div class="banner">
    <div class="box1200">
        <ul class="bnner_nav">
            <a href="/index/index/index.html">
                <li>首页</li>
            </a>
            <a href="#">
                <li class="nav_active">业务介绍</li>
            </a>
            <a href="#">
                <li>成功案例</li>
            </a>
            <a href="#">
                <li>新闻动态</li>
            </a>
            <a href="#">
                <li>开放平台</li>
            </a>
            <a href="#">
                <li>收益预测</li>
            </a>
            <a href="#">
                <li>联系我们</li>
            </a>
        </ul>
        <ul class="banner_right">
            <li>
                <i class="fa fa-user-circle" aria-hidden="true"></i>
                &nbsp;
                <?php if ($basisData['isGuest']): ?>
                    <span class="goLogin" style="cursor: pointer">登录</span>
                    /
                    <span class="goRegister" style="cursor: pointer">注册</span>
                <?php else: ?>
                    <a href="/user/user/user.html"><?= $basisData['user']->tel ?></a>
                    /
                    <a href="/login/login/logout.html">退出</a>
                <?php endif; ?>
            </li>
            <li>
                <i class="fa fa-phone-square" aria-hidden="true"></i>
                &nbsp; 热线电话：0000-0000
            </li>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--banner end-->

<!--head开始-->
<div class="header">
    <div class="box1200 nav_logo">
        <img src="/resources/images/logo.png"/>
    </div>

    <div class="box1200 nav_search">
        <input type="text" class="nasech" id="" placeholder="请输入"/>
        <button type="button" class="sea_btn"/>
        <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </div>
</div>
<!--head结束-->

<!--大标题开始-->
<div class="contentTit box1200">
    <ul class="big_tit">
        <li class="float_left"><?= $model->title ?></li>
        <li class="float_right">
					<span>
						<i class="fa fa-share-alt" aria-hidden="true"></i>
						<a href="#">分享此房源</a>
					</span>
        </li>
    </ul>
</div>
<!--大标题结束-->

<!--内容1开始-->
<div class="main box1200">
    <div class="main_box">
        <!--左边内容-->
        <div class="mainLeft float_left">
            <div class="show">
                <?php $images = explode(',', $model->image); ?>
                <img src="<?= $images[0] ?>" alt="">
                <div class="mask"></div>
            </div>
            <div class="smallshow">
                <p class="prev prevnone"></p>
                <div class="middle_box">
                    <ul class="middle">
                        <?php foreach ($images as $image): ?>
                            <li><img src="<?= $image ?>" alt=""></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <p class="next "></p>
            </div>
        </div>
        <div class="bigshow">
            <div class="bigitem">
                <img src="<?= $images[0] ?>" alt="">
            </div>
        </div>
        <script>
            $(function () {
                var obj = new mag('.show', '.bigshow', '.smallshow', '.mask', '.bigitem');
                obj.init();
            });
        </script>
        <!--右边内容-->
        <div class="mainRight float_right">
            <div class="tit_prc">
                <p class="price float_left"><?= $model->budget ?><span class="span_a">￥</span></p>
                <p class="price2 float_left">
                    <?= $model->areas ?>
                </p>
            </div>

            <ul class="detailed">
                <li><span class="gray">场地编号</span><?= $model->no ?></li>
                <li><span class="gray">所在区域</span><?= $model->area->full_name ?></li>
                <li><span class="gray">详细地址</span><?= $model->address ?></li>
                <li><span class="gray">发布时间</span><?= date('Y-m-d H:i:s', $model->created) ?></li>
            </ul>
            <!--联系人-->
            <div class="contacts">
                <ul>
                    <li class="head_port float_left"><img src="/resources/images/head1.png"/></li>
                    <li class="infor float_left">
                        <span class="names"><?= $model->cobber->ident->name ?></span>
                        <span class="ntxt">本场地信息由我维护，有变化最快得知</span>
                    </li>
                </ul>
                <!--清除浮动-->
                <div class="clear"></div>
                <p class="phone"><?= $model->cobber->tel ?></p>
            </div>
        </div>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--内容1结束-->

<!--内容2开始-->
<div class="main2 box1200">
    <!--场地信息-->
    <div class="site">
        <!--title-->
        <div class="h2">
            场地基本信息
        </div>
        <!--基本属性-->
        <div class="infors">
            <div class="infors_name">基本属性</div>
            <ul class="list_info">
                <li><span class="list_cont">房屋户型</span>2室1厅1厨1卫</li>
                <li><span class="list_cont">所在楼层</span>低楼层 (共17层)</li>
                <li><span class="list_cont">建筑面积</span>43.56㎡</li>
                <li><span class="list_cont">户型结构</span>平层</li>
                <li><span class="list_cont">套内面积</span>暂无数据</li>
                <li><span class="list_cont">建筑类型</span>板楼</li>
                <li><span class="list_cont">房屋朝向</span>南</li>
                <li><span class="list_cont">建筑结构</span>钢混结构</li>
                <li><span class="list_cont">装修情况</span>其他</li>
                <li><span class="list_cont">梯户比例</span>两梯八户</li>
                <li><span class="list_cont">配备电梯</span>有</li>
                <li><span class="list_cont">产权年限</span>70年</li>
            </ul>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>

        <!--交易属性-->
        <div class="trade">
            <div class="infors_name">交易属性</div>
            <ul class="list_info">
                <li><span class="list_cont">挂牌时间</span>2018-09-19</li>
                <li><span class="list_cont">交易属性</span>商品房</li>
                <li><span class="list_cont">上次交易</span>2018-10-22</li>
                <li><span class="list_cont">房屋用途</span>普通中住宅</li>
                <li><span class="list_cont">房屋年限</span>满两年</li>
                <li><span class="list_cont">产权所属</span>非共有</li>
                <li><span class="list_cont">抵押信息</span>暂无数据</li>
                <li><span class="list_cont">房本备件</span>已上传房本照片</li>
            </ul>
            <!--清除浮动-->
            <div class="clear"></div>
        </div>
        <div class="disclaimer">注：房源所示“房屋用途、交易权属、建成年代、产权年限、建筑结构”仅供参考，购房时请以房本信息为准。</div>
    </div>

    <!--场地源特色-->
    <div class="field">
        <!--title-->
        <div class="h2">
            场地源特色
        </div>
        <div class="infors"></div>
    </div>

    <!--地图开始-->
    <div class="map">
        <!--title-->
        <div class="h2">
            地图
        </div>
        <div id="map" style="width:100%; height: 500px;"></div>
        <script>
            var map = new BMap.Map('map');
            map.enableScrollWheelZoom(true);
            var point = new BMap.Point(116.404, 39.915);
            map.centerAndZoom(point, 16);
            map.addOverlay(new BMap.Marker(point));
        </script>
    </div>
</div>

<!--内容2结束-->

<!--好场地为您推荐开始-->
<div class="good_site box1200 marginTop80">
    <div class="gdTit">
        好场地为您推荐开始
    </div>
    <ul class="gd_list">
        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd5.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>

        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd4.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd3.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li class="mgrt0">
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd2.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd4.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd1.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li>
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd2.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
        <li class="mgrt0">
            <a href="#">
                <img style="width: 290px; height: 210px;" src="/resources/images/cd3.jpg"/>
            </a>
            <span class="marked">116万</span>
            <p class="htitle">
                <span class="htitle_name"><a target="_blank" href="#">保利香槟光华</a></span>
                <span class="htitle_info">2室1厅/55.72平米</span>
            </p>
        </li>
    </ul>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--好场地为您推荐结束-->

<!--同总价场地开始-->
<div class="same_price box1200 marginTop80">
    <div class="gdTit">
        好场地为您推荐开始
    </div>
    <ul class="same_list">
        <a href="#">
            <li>
                <img src="/resources/images/cd3.jpg"/>
                <div class="txt_same">
                    高新 - 天府五街
                </div>
                <span class="type">116万</span>
                <p class="avg_price">均价：<span style="color: #cb4c3f;">11111</span>元/平</p>
            </li>
        </a>

        <a href="#">
            <li>
                <img src="/resources/images/cd3.jpg"/>
                <div class="txt_same">
                    高新 - 天府五街
                </div>
                <span class="type">116万</span>
                <p class="avg_price">均价：<span style="color: #cb4c3f;">11111</span>元/平</p>
            </li>
        </a>

        <a href="#">
            <li>
                <img src="/resources/images/cd3.jpg"/>
                <div class="txt_same">
                    高新 - 天府五街
                </div>
                <span class="type">116万</span>
                <p class="avg_price">均价：<span style="color: #cb4c3f;">11111</span>元/平</p>
            </li>
        </a>

        <a href="#">
            <li>
                <img src="/resources/images/cd3.jpg"/>
                <div class="txt_same">
                    高新 - 天府五街
                </div>
                <span class="type">116万</span>
                <p class="avg_price">均价：<span style="color: #cb4c3f;">11111</span>元/平</p>
            </li>
        </a>

        <a href="#">
            <li class="mgrts0">
                <img src="/resources/images/cd3.jpg"/>
                <div class="txt_same">
                    高新 - 天府五街
                </div>
                <span class="type">116万</span>
                <p class="avg_price">均价：<span style="color: #cb4c3f;">11111</span>元/平</p>
            </li>
        </a>
        <!--清除浮动-->
        <div class="clear"></div>
    </ul>
</div>
<!--同总价场地结束-->

<!--我要卖场地开始-->
<div class="sell_site box1200 marginTop80">
    <div class="gdTit">
        我要卖场地
    </div>
    <ul class="sell_list">
        <li>
            <img src="/resources/images/cd.jpg"/>
            <p><a href="#">我有场地 &nbsp;&gt;</a></p>
        </li>
        <li>
            <img src="/resources/images/num.png"/>
            <p><a href="/estimate/estimate/estimate.html">我要估计 &nbsp;&gt;</a></p>
        </li>
        <li class="sell_mgrt">
            <img src="/resources/images/tz.jpg"/>
            <p><a href="#">我要投资 &nbsp;&gt;</a></p>
        </li>
    </ul>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--我要卖场地结束-->

<!--脚部start-->
<div class="footer marginTop80">
    <div class="box1200">
        <!--合作商-->
        <ul class="footer_nav">
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
            <li><a rel="nofollow" target="_blank" href="//online.unionpay.com/"><img src="/resources/images/logo.png"/></a>
            </li>
        </ul>
        <!--关于我们-->
        <ul class="footer_list">
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a>&nbsp; |&nbsp;</li>
            <li><a href="#">关于我们</a></li>
        </ul>
        <!--公众号-->
        <ul class="public">
            <li><img src="/resources/images/en2.png"/></li>
            <li><img src="/resources/images/en2.png"/></li>
        </ul>
        <!--底部版权-->
        <p>Copyright © 2018 en.link，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
<script type="text/javascript">
    $(function () {
    });
</script>
</body>
</html>
