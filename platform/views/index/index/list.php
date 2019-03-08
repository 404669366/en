<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>场地搜索</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>
    <!--引入list样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/list.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <!--引入jquery-->
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/top.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/login.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/eye.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/submit.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run() ?>
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
                    <li <?= $v['name'] == '场地搜索' ? 'class="nav_active"' : '' ?>><?= $v['name'] ?></li>
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
                &nbsp; 热线电话：<?= \vendor\helpers\Constant::getServiceTel() ?>
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
        $('.nasech').val(getParams('search'));
        $('.sea_btn').click(function () {
            search('.nasech');
        });
        $(document).keypress(function (event) {
            if (event.which === 13) {
                search('.nasech');
            }
        });

        function search(element) {
            var params = '?type=' + getParams('type', 1) + '&search=' + $(element).val();
            window.location.href = '/index/index/list.html' + params;
        }
    </script>
</div>
<!--head结束-->

<!--content start-->
<div class="content box1200">
    <div class="list_group1">
        <ul>
            <li type="1">最新</li>
            <li type="2">融资</li>
            <li type="3">人气</li>
            <li type="4">点击</li>
            <li type="5">车位</li>
            <li type="6">总价</li>
        </ul>
        <script>

            $('.list_group1').find('[type="' + getParams('type', 1) + '"]').addClass('sort_active');
            $('.list_group1 li').click(function () {
                var params = '?type=' + $(this).attr('type') + '&search=' + $('.nasech').val();
                window.location.href = '/index/index/list.html' + params;
            });
        </script>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
    <!--标题-->
    <div class="list_tit">
        共找到 <span style="color:#3072F6;"><?= $fields['total'] ?></span> 个场地
    </div>
    <!--推荐列表1-->
    <?php foreach ($fields['data'] as $data): ?>
        <ul class="listCont">
            <li class="listData">
                <a href="/index/index/details.html?no=<?= $data['no'] ?>"><img src="<?= $data['image'][0] ?>"/></a>
                <a href="/index/index/details.html?no=<?= $data['no'] ?>" style="color: #333333">
                    <div class="info">
                        <p class="info_tit"><?= $data['title'] ?></p>
                        <p class="address"><i class="fa fa-barcode"
                                              aria-hidden="true"></i>&nbsp;<?= $data['no'] ?>
                        <p class="address">&nbsp;<i class="fa fa-map-marker"
                                                    aria-hidden="true"></i>&nbsp;<?= $data['full_name'] ?></p>
                        <p class="address">
                            <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<?= $data['address'] ?>
                            &nbsp;/&nbsp;<?= $data['park'] ?>车位</p>
                        <p class="address"><i class="fa fa-star-o"
                                              aria-hidden="true"></i>&nbsp;<?= $data['attention'] ?>人关注
                            / 共<?= $data['click'] ?>次点击 / <?= $data['created'] ?>发布</p>
                    </div>
                </a>
                <!--清除浮动-->
                <div class="clear"></div>
            </li>
            <a class="follow" href="/user/follow/follow.html?no=<?= $data['no'] ?>" style="text-decoration: none">关注</a>
            <div class="unit_price">
                <p class="price"><span
                            style="font-size: 26px;font-weight: 600;margin: 0 6px;"><?= $data['budget'] ?></span>￥</p>
            </div>
        </ul>
    <?php endforeach; ?>
</div>
<!--content end-->

<!--推荐开始-->
<div class="recommend marginTop80">
    <div class="recom_cont box1200">
        <p class="recomTit">推荐场地</p>
        <ul class="recomList">
            <?php foreach ($recommend as $k => $v): ?>
                <li <?= count($recommend) == $k + 1 ? 'class="marginRt"' : '' ?>>
                    <a href="/index/index/details.html?no=<?= $v['no'] ?>">
                        <img src="<?= $v['image'][0] ?>"/>
                        <div class="description"><?= $v['full_name'] ?></div>
                    </a>
                    <div class="rec_price" style="width: 100%">
                        <div style="float: left">
                            <?= $data['budget'] ?><span>￥</span>
                        </div>
                        <div style="float: right">
                            <?= $v['park'] ?><span>车位</span>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>

</div>
<!--推荐结束-->

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
                    <a href="<?= $v['url'] ?>"><?= $v['name'] ?></a><?= count(\vendor\en\Menu::getMenu()) == $k + 1 ? '' : '&nbsp; |&nbsp;' ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--公众号-->
        <ul class="public">
            <li><img src="/resources/images/en2.png"/></li>
            <li><img src="/resources/images/en2.png"/></li>
        </ul>
        <!--底部版权-->
        <p>Copyright © 2018 en.ink，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
<script type="text/javascript">
    $(function () {

    });
</script>
</body>
</html>
