<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>场地详情</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/mag.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入details样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/radialIndicator.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/details.css"/>
    <!--引入字体-->
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
    <script src="/resources/js/radialIndicator.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run('PopupMsg') ?>
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
            <?php foreach (\vendor\en\Menu::getMenu() as $v): ?>
                <a href="<?= $v['url'] ?>">
                    <li class="nav_active"><?= $v['name'] ?></li>
                </a>
            <?php endforeach; ?>

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
        <input type="text" class="nasech" id="" placeholder="搜索场地"/>
        <button type="button" class="sea_btn"/>
        <i class="fa fa-search" aria-hidden="true"></i>
        </button>
    </div>
    <script>
        $('.sea_btn').click(function () {
            search('.nasech');
        });
        $(document).keypress(function (event) {
            if (event.which === 13) {
                search('.nasech');
            }
        });

        function search(element) {
            var params = '?search=' + $(element).val();
            window.location.href = '/index/index/list.html' + params;
        }
    </script>
</div>
<!--head结束-->

<!--大标题开始-->
<div class="contentTit box1200">
    <ul class="big_tit">
        <li class="float_left"><?= $model->title ?></li>
        <li class="float_right" style="display: none">
					<span>
						<i class="fa fa-share-alt" aria-hidden="true"></i>
						<a href="#">分享此场地</a>
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
        <div class="mainRight float_right" style="position: relative">
            <div class="tit_prc">
                <p class="price float_left"><?= $model->budget ?><span class="span_a">￥</span></p>
                <p class="price2 float_left">
                    <?= $model->areas ?>㎡
                </p>
                <a class="guan"
                   style="text-decoration: none;font-size: 18px;float: right;margin-top: 18px;line-height: 22px;color: #919191;cursor: pointer">关注</a>
                <script>
                    var isGuest = '<?=$basisData['isGuest']?>';
                    var url = '/user/follow/follow.html?no=<?= $model->no ?>';
                    $('.guan').click(function () {
                        if (!isGuest) {
                            window.location.href = url;
                        } else {
                            $('.goLogin').click();
                        }
                    });
                </script>
            </div>

            <ul class="detailed">
                <li><span class="gray">场地编号</span><?= $model->no ?></li>
                <li><span class="gray">所在区域</span><?= $model->area->full_name ?></li>
                <li><span class="gray">详细地址</span><?= $model->address ?></li>
                <li><span class="gray">发布时间</span><?= date('Y-m-d H:i:s', $model->created) ?></li>
            </ul>
            <div id="cycle"><?= ((float)$model->financing_ratio) * 100 ?></div>
            <!--联系人-->
            <div class="contacts">
                <ul>
                    <li class="head_port float_left"><img src="/resources/images/head1.png"/></li>
                    <li class="infor float_left">
                        <span class="names"><?= $model->cobber->ident->name ?></span>
                        <span class="ntxt">联系电话: <?= $model->cobber->tel ?></span>
                    </li>
                </ul>
                <!--清除浮动-->
                <div class="clear"></div>
                <p class="phone haveIntent" style="cursor: pointer">我有意向</p>
            </div>
        </div>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<div class="intent"
     style="display: none;width: 100%;height: 100%;position: fixed;z-index: 999;background: rgba(0, 0, 0, 0.7);;top: 0;left: 0">
    <div style="width: 340px;height: 235px;background: #fcfcfc;margin: 300px auto;border-radius: 3px;position: relative">
        <div class="close"
             style="position: absolute;right: 15px;top: 15px;height: 20px;line-height: 20px;width: 20px;text-align: center;font-size: 16px;cursor: pointer">
            <i class="fa fa-times" aria-hidden="true"></i>
        </div>
        <div style="width: 310px;height: 200px;position: absolute;top: 35px;padding: 0 15px">
            <span style="width: 310px;text-align: center;height: 30px;line-height: 30px;font-size: 24px;display: inline-block">我的意向</span>
            <input class="intentMoney"
                   style="width: 200px;height: 30px;line-height: 30px;font-size: 16px;display: block;margin: 45px auto 0 auto;"
                   placeholder="请填写意向金额"/>
            <span style="width: 310px;text-align: center;height: 30px;font-size: 16px;display: inline-block;margin-top: 30px;">
                <button class="intentButton" type="button"
                        style="border: none;border-radius:3px;color: white;background-color: #3072F6;width: 120px;display: inline-block;height: 30px;line-height: 30px;">提交意向</button>
            </span>
        </div>
    </div>
</div>
<script>
    $('.haveIntent').click(function () {
        if (!isGuest) {
            var status = '<?=$model->status?>';
            if (status != 15) {
                layer.msg('抱歉,融资已结束...');
                return false;
            }
            $('.intent').fadeIn();
        } else {
            $('.goLogin').click();
        }
    });
    $('.intent .close').click(function () {
        $('.intent').fadeOut();
    });
    $('.intentButton').click(function () {
        var money = $('.intentMoney').val();
        if (!money || isNaN(money)) {
            layer.msg('请填写正确的意向金额');
            return;
        }
        $.getJSON('/user/intention/add.html', {
            no: '<?=$model->no?>',
            money: money
        }, function (re) {
            if (re.type) {
                layer.msg('提交成功,工作人员将尽快联系您!');
            } else {
                layer.msg(re.msg);
            }
            $('.intent').fadeOut();
        })
    });
</script>
<!--内容1结束-->

<!--内容2开始-->
<div class="main2 box1200">
    <div class="site">
        <div class="h2">
            配置单
        </div>
        <div class="infors">
            <?php foreach (explode(',', $model->configure_photo) as $v): ?>
                <img src="<?= $v ?>" alt=""
                     style="width: 100%;margin-bottom: 20px">
            <?php endforeach; ?>
        </div>
    </div>
    <div class="site">
        <div class="h2">
            预算报表
        </div>
        <div class="infors">
            <?php foreach (explode(',', $model->budget_photo) as $v): ?>
                <img src="<?= $v ?>" alt=""
                     style="width: 100%;margin-bottom: 20px">
            <?php endforeach; ?>
        </div>
    </div>
    <div class="site">
        <div class="h2">
            施工图纸
        </div>
        <div class="infors">
            <?php foreach (explode(',', $model->field_drawing) as $v): ?>
                <img src="<?= $v ?>" alt=""
                     style="width: 100%;margin-bottom: 20px">
            <?php endforeach; ?>
        </div>
    </div>
    <div class="site">
        <div class="h2">
            场地备案
        </div>
        <div class="infors">
            <?php foreach (explode(',', $model->record_photo) as $v): ?>
                <img src="<?= $v ?>" alt=""
                     style="width: 100%;margin-bottom: 20px">
            <?php endforeach; ?>
        </div>
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
            var point = new BMap.Point('<?=$model->lng?>' || 116.404, '<?=$model->lat?>' || 39.915);
            map.centerAndZoom(point, 16);
            map.addOverlay(new BMap.Marker(point));
            map.addControl(new BMap.NavigationControl({
                anchor: BMAP_ANCHOR_TOP_RIGHT,
                type: BMAP_NAVIGATION_CONTROL_SMALL
            }));
        </script>
    </div>
</div>

<!--内容2结束-->

<!--好场地为您推荐开始-->
<div class="good_site box1200 marginTop80">
    <div class="gdTit">
        好场地为您推荐
    </div>
    <ul class="gd_list">
        <?php foreach ($recommends as $k => $recommend): ?>
            <li <?= ($k + 1) % 4 == 0 ? 'class="mgrt0"' : '' ?>>
                <a href="/index/index/details.html?no=<?= $recommend['no'] ?>">
                    <img style="width: 290px; height: 210px;" src="<?= $recommend['image'][0] ?>"/>
                </a>
                <span class="marked"><?= $recommend['budget'] ?>￥</span>
                <p class="htitle">
                    <span class="htitle_name"><a target="_blank" href="#"><?= $recommend['address'] ?></a></span>
                    <span class="htitle_info"><?= $recommend['areas'] . '㎡' ?></span>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--好场地为您推荐结束-->
<!--我要卖场地开始-->
<div class="sell_site box1200 marginTop80">
    <div class="gdTit">
        快捷通道
    </div>
    <ul class="sell_list">
        <li>
            <img src="/resources/images/cd.jpg"/>
            <p><a href="/user/release/release-basis.html">我有场地 &gt;</a></p>
        </li>
        <li>
            <img src="/resources/images/num.png"/>
            <p><a href="/estimate/estimate/estimate.html">收益测算 &gt;</a></p>
        </li>
        <li class="sell_mgrt">
            <img src="/resources/images/tz.jpg"/>
            <p><a href="/user/ident/ident.html">成为合伙人 &gt;</a></p>
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
            <?php foreach ($basisData['friends'] as $v): ?>
                <li><a rel="nofollow" target="_blank" href="<?= $v['url'] ?>"><img
                                src="<?= $v['image'] ?>"/></a></li>
            <?php endforeach; ?>
        </ul>
        <!--关于我们-->
        <ul class="footer_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $k => $v): ?>
                <li>
                    <a href="<?= $v['url'] ?>"><?= $v['name'] ?></a><?= count(\vendor\en\Menu::getMenu()) == $k + 1 ? '' : '&nbsp;|&nbsp;' ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--公众号-->
        <ul class="public">
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
