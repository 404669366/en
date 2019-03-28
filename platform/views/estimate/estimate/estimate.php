<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>收益预测</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/header.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/login.css"/>
    <!--引入当前样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/estimate.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/submit.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/sms.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/login.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/eye.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run('0.4rem') ?>
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
                    <li <?= $v['name'] == '收益预测' ? 'class="nav_active"' : '' ?>><?= $v['name'] ?></li>
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
        <ul class="head_list">
            <li><a href="/user/release/release-basis.html">我有场地</a></li>
            <li><a href="/estimate/estimate/estimate.html" class="active">收益测算</a></li>
        </ul>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
    <!--大标题-->
    <div class="box1200 nav_tit">
        开始收益测算,了解未来行情
    </div>
</div>
<!--head结束-->

<!--估价表单开始-->
<input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
<div class="m_form">
    <ul class="form_list">
        <li>
            <span class="list_names" style="width: 80px">投建功率 :</span>
            <input type="text" class="powers" placeholder="请填写预计投建功率(kw)"/>
        </li>
        <li>
            <span class="list_names" style="width: 80px">日均时长 :</span>
            <input type="text" class="hours" placeholder="请填写日均时长(小时)"/>
        </li>
        <style>
            .estimate {
                width: 120%;
                margin-left: -10%;
                min-height: 300px;
                font-size: 14px;
                text-align: center;
            }

            .estimate td {
                min-width: 80px;
                height: 24px;
            }
        </style>
        <li>
            <table border="1" class="estimate">
                <tr>
                    <td colspan="13" style="height: 36px;font-weight: 600">充电站收益测算表</td>
                </tr>
                <tr>
                    <td colspan="2">投建功率:</td>
                    <td colspan="2" class="power"></td>
                    <td colspan="2">变压器:</td>
                    <td colspan="2" class="transformer"></td>
                    <td colspan="2">总投资额:</td>
                    <td colspan="3" class="total"></td>
                </tr>
                <tr>
                    <td colspan="2">盈利增值:</td>
                    <td colspan="2" class="raiseRatio"></td>
                    <td colspan="2">场地分成:</td>
                    <td colspan="2" class="field"></td>
                    <td colspan="3">三费(平台,代运营,运维):</td>
                    <td colspan="2" class="roof"></td>
                </tr>
                <tr>
                    <td colspan="2">电损:</td>
                    <td colspan="2" class="pLoss"></td>
                    <td colspan="2">服务费:</td>
                    <td colspan="2" class="servers"></td>
                    <td colspan="3">日均使用时长:</td>
                    <td colspan="2" class="dayHours"></td>
                </tr>
                <tr>
                    <td rowspan="2">类别</td>
                    <td rowspan="2">项目</td>
                    <td rowspan="2">单位</td>
                    <td rowspan="2">合计</td>
                    <td>建设期(年)</td>
                    <td colspan="8">经营期(年)</td>
                </tr>
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                </tr>
                <tr>
                    <td rowspan="2">项目投资额</td>
                    <td>设备购置</td>
                    <td>万元</td>
                    <td class="totals"></td>
                    <td class="totals"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>固定资产年度折旧额</td>
                    <td>万元</td>
                    <td class="totals"></td>
                    <td></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                    <td class="depreciation"></td>
                </tr>
                <tr>
                    <td rowspan="3">经营现金流入</td>
                    <td>充电服务费收益</td>
                    <td>万元</td>
                    <td class="serviceChargeAll"></td>
                    <td></td>
                    <td class="serviceCharge1"></td>
                    <td class="serviceCharge2"></td>
                    <td class="serviceCharge3"></td>
                    <td class="serviceCharge4"></td>
                    <td class="serviceCharge5"></td>
                    <td class="serviceCharge6"></td>
                    <td class="serviceCharge7"></td>
                    <td class="serviceCharge8"></td>
                </tr>
                <tr>
                    <td>财政补贴</td>
                    <td>万元</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>其他(广告,集客等)</td>
                    <td>万元</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="4">经营现金流出</td>
                    <td>场地方分成</td>
                    <td>万元</td>
                    <td class="fieldCommissionAll"></td>
                    <td></td>
                    <td class="fieldCommission1"></td>
                    <td class="fieldCommission2"></td>
                    <td class="fieldCommission3"></td>
                    <td class="fieldCommission4"></td>
                    <td class="fieldCommission5"></td>
                    <td class="fieldCommission6"></td>
                    <td class="fieldCommission7"></td>
                    <td class="fieldCommission8"></td>
                </tr>
                <tr>
                    <td>三费</td>
                    <td>万元</td>
                    <td class="roofCommissionAll"></td>
                    <td></td>
                    <td class="roofCommission1"></td>
                    <td class="roofCommission2"></td>
                    <td class="roofCommission3"></td>
                    <td class="roofCommission4"></td>
                    <td class="roofCommission5"></td>
                    <td class="roofCommission6"></td>
                    <td class="roofCommission7"></td>
                    <td class="roofCommission8"></td>
                </tr>
                <tr>
                    <td>电损</td>
                    <td>万元</td>
                    <td class="powerLossAll"></td>
                    <td></td>
                    <td class="powerLoss1"></td>
                    <td class="powerLoss2"></td>
                    <td class="powerLoss3"></td>
                    <td class="powerLoss4"></td>
                    <td class="powerLoss5"></td>
                    <td class="powerLoss6"></td>
                    <td class="powerLoss7"></td>
                    <td class="powerLoss8"></td>
                </tr>
                <tr>
                    <td>保险费</td>
                    <td>万元</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>现金流净值</td>
                    <td>年度净现金流量</td>
                    <td>万元</td>
                    <td class="moneyFlowAll"></td>
                    <td></td>
                    <td class="moneyFlow1"></td>
                    <td class="moneyFlow2"></td>
                    <td class="moneyFlow3"></td>
                    <td class="moneyFlow4"></td>
                    <td class="moneyFlow5"></td>
                    <td class="moneyFlow6"></td>
                    <td class="moneyFlow7"></td>
                    <td class="moneyFlow8"></td>
                </tr>
                <tr>
                    <td>净利润</td>
                    <td>年度净利润总额</td>
                    <td>万元</td>
                    <td class="yearProfitAll"></td>
                    <td class="delTotals"></td>
                    <td class="yearProfit1"></td>
                    <td class="yearProfit2"></td>
                    <td class="yearProfit3"></td>
                    <td class="yearProfit4"></td>
                    <td class="yearProfit5"></td>
                    <td class="yearProfit6"></td>
                    <td class="yearProfit7"></td>
                    <td class="yearProfit8"></td>
                </tr>
            </table>
        </li>
    </ul>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--估价表单结束-->

<!--去估价按钮-->
<div class="m_submit">
    <div class="wrap">
        <button type="button" class="btn_submit">立即测算</button>
        <div class="btn_text">测算结果由亿能系统模型提供</div>
    </div>
</div>
<!--去估价按钮结束-->
<script>
    $('.btn_submit').click(function () {
        var power = $('.powers').val();
        if (!power || isNaN(power)) {
            layer.msg('请填写正确的功率');
            return;
        }
        var hours = $('.hours').val();
        if (!hours || isNaN(hours)) {
            layer.msg('请填写正确的时长');
            return;
        }
        if (hours > 24) {
            layer.msg('时长最大24小时');
            return;
        }
        $.getJSON('/estimate/estimate/data.html', {power: power, hours: hours}, function (re) {
            if (re.type) {
                $('.power').text(re.data.config.power + 'kw');
                $('.transformer').text(re.data.config.transformer);
                $('.total').text(re.data.config.total.toFixed(2) + '万元');
                $('.raiseRatio').text(re.data.config.raiseRatio * 100 + '%');
                $('.field').text(re.data.config.field * 100 + '%');
                $('.roof').text(re.data.config.roof * 100 + '%');
                $('.pLoss').text((re.data.config.pLoss * 100).toFixed(0) + '%');
                $('.dayHours').text(re.data.config.dayHours + '小时');
                $('.servers').text(re.data.config.servers.toFixed(2) + '元');
                $('.totals').text(re.data.config.total.toFixed(2));
                $('.delTotals').text('-' + re.data.config.total.toFixed(2));
                $('.depreciation').text(re.data.data.depreciation.toFixed(2));
                $('.serviceChargeAll').text(re.data.data.serviceChargeAll.toFixed(2));
                $('.serviceCharge1').text(re.data.data.serviceCharge[1].toFixed(2));
                $('.serviceCharge2').text(re.data.data.serviceCharge[2].toFixed(2));
                $('.serviceCharge3').text(re.data.data.serviceCharge[3].toFixed(2));
                $('.serviceCharge4').text(re.data.data.serviceCharge[4].toFixed(2));
                $('.serviceCharge5').text(re.data.data.serviceCharge[5].toFixed(2));
                $('.serviceCharge6').text(re.data.data.serviceCharge[6].toFixed(2));
                $('.serviceCharge7').text(re.data.data.serviceCharge[7].toFixed(2));
                $('.serviceCharge8').text(re.data.data.serviceCharge[8].toFixed(2));
                $('.fieldCommissionAll').text(re.data.data.fieldCommissionAll.toFixed(2));
                $('.fieldCommission1').text(re.data.data.fieldCommission[1].toFixed(2));
                $('.fieldCommission2').text(re.data.data.fieldCommission[2].toFixed(2));
                $('.fieldCommission3').text(re.data.data.fieldCommission[3].toFixed(2));
                $('.fieldCommission4').text(re.data.data.fieldCommission[4].toFixed(2));
                $('.fieldCommission5').text(re.data.data.fieldCommission[5].toFixed(2));
                $('.fieldCommission6').text(re.data.data.fieldCommission[6].toFixed(2));
                $('.fieldCommission7').text(re.data.data.fieldCommission[7].toFixed(2));
                $('.fieldCommission8').text(re.data.data.fieldCommission[8].toFixed(2));
                $('.roofCommissionAll').text(re.data.data.roofCommissionAll.toFixed(2));
                $('.roofCommission1').text(re.data.data.roofCommission[1].toFixed(2));
                $('.roofCommission2').text(re.data.data.roofCommission[2].toFixed(2));
                $('.roofCommission3').text(re.data.data.roofCommission[3].toFixed(2));
                $('.roofCommission4').text(re.data.data.roofCommission[4].toFixed(2));
                $('.roofCommission5').text(re.data.data.roofCommission[5].toFixed(2));
                $('.roofCommission6').text(re.data.data.roofCommission[6].toFixed(2));
                $('.roofCommission7').text(re.data.data.roofCommission[7].toFixed(2));
                $('.roofCommission8').text(re.data.data.roofCommission[8].toFixed(2));
                $('.powerLossAll').text(re.data.data.powerLossAll.toFixed(2));
                $('.powerLoss1').text(re.data.data.powerLoss[1].toFixed(2));
                $('.powerLoss2').text(re.data.data.powerLoss[2].toFixed(2));
                $('.powerLoss3').text(re.data.data.powerLoss[3].toFixed(2));
                $('.powerLoss4').text(re.data.data.powerLoss[4].toFixed(2));
                $('.powerLoss5').text(re.data.data.powerLoss[5].toFixed(2));
                $('.powerLoss6').text(re.data.data.powerLoss[6].toFixed(2));
                $('.powerLoss7').text(re.data.data.powerLoss[7].toFixed(2));
                $('.powerLoss8').text(re.data.data.powerLoss[8].toFixed(2));
                $('.moneyFlowAll').text(re.data.data.moneyFlowAll.toFixed(2));
                $('.moneyFlow1').text(re.data.data.moneyFlow[1].toFixed(2));
                $('.moneyFlow2').text(re.data.data.moneyFlow[2].toFixed(2));
                $('.moneyFlow3').text(re.data.data.moneyFlow[3].toFixed(2));
                $('.moneyFlow4').text(re.data.data.moneyFlow[4].toFixed(2));
                $('.moneyFlow5').text(re.data.data.moneyFlow[5].toFixed(2));
                $('.moneyFlow6').text(re.data.data.moneyFlow[6].toFixed(2));
                $('.moneyFlow7').text(re.data.data.moneyFlow[7].toFixed(2));
                $('.moneyFlow8').text(re.data.data.moneyFlow[8].toFixed(2));
                $('.yearProfitAll').text(re.data.data.yearProfitAll.toFixed(2));
                $('.yearProfit1').text(re.data.data.yearProfit[1].toFixed(2));
                $('.yearProfit2').text(re.data.data.yearProfit[2].toFixed(2));
                $('.yearProfit3').text(re.data.data.yearProfit[3].toFixed(2));
                $('.yearProfit4').text(re.data.data.yearProfit[4].toFixed(2));
                $('.yearProfit5').text(re.data.data.yearProfit[5].toFixed(2));
                $('.yearProfit6').text(re.data.data.yearProfit[6].toFixed(2));
                $('.yearProfit7').text(re.data.data.yearProfit[7].toFixed(2));
                $('.yearProfit8').text(re.data.data.yearProfit[8].toFixed(2));
                layer.msg('收益预测成功');
            } else {
                layer.msg('预测错误请稍后再试');
            }
        });
    });
</script>

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
</body>
</html>
