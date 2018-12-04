<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>user</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <!--引入user样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/user.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/area.js" type="text/javascript" charset="utf-8"></script>
    <script src="/upload/upload.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<?php \vendor\helpers\Msg::run('PopupMsg') ?>
<!--header-->
<div class="header">
    <div class="nav box1200">
        <img src="/resources/images/LG.png"/>
        <ul class="nva_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $v): ?>
                <a href="<?= $v['url'] ?>">
                    <li><?= $v['name'] ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
        <div class="esc">
            <?= $basisData['user']['tel'] ?> |
            <a href="/login/login/logout.html">退出</a>
        </div>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--header end-->

<!--content-->
<div class="user_cont">
    <!--左边内容-->
    <div class="user_contLt float_left">
        <img src="/resources/images/user.png"/>
        <p class="welcome">欢迎你，<?= $basisData['user']['tel'] ?></p>
        <ul>
            <li><a href="/user/user/user.html">关注场地</a></li>
            <li><a href="/user/user/basis-field.html">基础场地</a></li>
            <?php if ($basisData['isCobber']): ?>
                <li><a href="/user/user/track-field.html">场地跟踪</a></li>
            <?php endif; ?>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li class="actives"><a href="/user/user/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容2-->
        <div class="inner_Cont">
            <div class="userTit">
                认证合伙人
            </div>
            <?php if (!$basisData['isCobber']): ?>
                <form action="/user/user/add-ident.html" method="post">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <input type="hidden" name="now_type" value="1">
                    <ul class="change_pwd">
                        <li class="area">
                            <span>场地地域 :</span>
                            <select class="province"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                            <select class="city"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                            <select class="county"
                                    style="width: auto;text-align: center;text-align-last: center"></select>
                        </li>
                        <li>
                            <span>详细地址：</span>
                            <input type="text" placeholder="请填写详细地址" name="address" validate="notNull" maxlength="20">
                        </li>
                        <li>
                            <span>银行类型：</span>
                            <select name="bank_type" style="width: 249px;height: 40px">
                                <?php foreach (\vendor\helpers\Constant::getBankType() as $k => $v): ?>
                                    <option value="<?= $k ?>"><?= $v ?></option>
                                <?php endforeach; ?>
                            </select>
                        </li>
                        <li>
                            <span>银行卡号：</span>
                            <input type="text" placeholder="请填写银行卡号" name="bank_no" validate="notNull" maxlength="20">
                        </li>
                        <li>
                            <span>真实姓名：</span>
                            <input type="text" placeholder="请填写真实姓名" name="name" validate="notNull" maxlength="20">
                        </li>
                        <li>
                            <span>身份证正面：</span>
                            <div class="card_positive"></div>
                            <script>
                                upload({
                                    element: '.card_positive',
                                    name: 'card_positive',
                                    height: 10
                                });
                            </script>
                        </li>
                        <li>
                            <span>身份证反面：</span>
                            <div class="card_opposite"></div>
                            <script>
                                upload({
                                    element: '.card_opposite',
                                    name: 'card_opposite',
                                    height: 10
                                });
                            </script>
                        </li>
                        <li class="formal" style="text-align: center;height: 30px;line-height: 30px;cursor: pointer">
                            申请成为正式合伙人
                        </li>
                        <li class="moneyIdent" style="display: none">
                            <span>打款凭证：</span>
                            <div class="money_ident"></div>
                            <script>
                                upload({
                                    element: '.money_ident',
                                    name: 'money_ident',
                                    max: 4,
                                    height: 10
                                });
                            </script>
                        </li>
                        <li class="ordinary"
                            style="text-align: center;height: 30px;line-height: 30px;cursor: pointer;display: none">
                            申请成为普通合伙人
                        </li>
                        <li>
                            <span></span>
                            <button type="submit">开始认证</button>
                        </li>
                    </ul>
                </form>
                <script>
                    $('.formal').click(function () {
                        $('.moneyIdent').fadeIn();
                        $('.ordinary').fadeIn();
                        $(this).fadeOut();
                        $('[name="now_type"]').val(2);
                    });
                    $('.ordinary').click(function () {
                        $('.moneyIdent').fadeOut();
                        $(this).fadeOut();
                        $('.formal').fadeIn();
                        $('[name="now_type"]').val(1);
                    });
                </script>
            <?php endif; ?>
            <?php if ($basisData['isCobber'] && $basisData['isCobber']->type == 1): ?>
                <form action="/user/user/update-ident.html?id=<?=$basisData['isCobber']->id?>" method="post">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <ul class="change_pwd">
                        <li>
                            <span>打款凭证：</span>
                            <div class="money_ident"></div>
                            <script>
                                upload({
                                    element: '.money_ident',
                                    name: 'money_ident',
                                    max: 4,
                                    height: 10
                                });
                            </script>
                        </li>
                        <li style="text-align: center;height: 30px;line-height: 30px;cursor: pointer;">
                            申请成为正式合伙人
                        </li>
                        <li>
                            <span></span>
                            <button type="submit">开始认证</button>
                        </li>
                    </ul>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--content end-->

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
        <p>Copyright © 2018 en.link，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
