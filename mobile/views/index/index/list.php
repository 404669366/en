<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>场地列表</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/foot.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/list.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run() ?>
</head>

<body>
<!--header start-->
<div class="header">
    <div class="personal">
        <a href="javascript:history.back(-1)">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <img src="/resources/img/logo.png"/>
        </a>
        <p>
            <a href="/user/user/user.html">
                <i class="fa fa-user-o" aria-hidden="true"></i>
            </a>
        </p>
    </div>
</div>
<!--header end-->

<!--search start-->
<div class="search">
    <div class="inputBox">
        <input type="text" class="searchKey" placeholder="请输入小区或商圈名称">
        <div class="searchBtn">
            <i class="fa fa-search" aria-hidden="true"></i>
        </div>
    </div>
</div>
<!--search end-->

<!--Slide list start-->
<div class="slideList">
    <div class="slits">
        <span type="1">最新</span>
        <span type="2">火热</span>
        <span type="3">人气</span>
        <span type="4">点击</span>
        <span type="5">面积</span>
        <span type="6">总价</span>
    </div>
</div>
<script>
    $(function () {
        var focus = getParams('focus', 0);
        if(focus){
            $('.searchKey').focus();
        }
        var now = getParams('type', 1);
        $('.searchKey').val(getParams('search', ''));
        $('.slits span').removeClass('active').click(function () {
            var search = $('.searchKey').val();
            window.location.href = '?search=' + search + '&type=' + $(this).attr('type');
        });
        $.each($('.slits>span'), function (k, v) {
            if ($(this).attr('type') == now) {
                $(this).addClass('active');
            }
        });
        $('.searchBtn').click(function () {
            var search = $('.searchKey').val();
            window.location.href = '?search=' + search + '&type=' + now;
        });
    });
</script>
<!--Slide list end-->

<!--main start-->
<div class="recommend">
    <!--列表-->
    <div class="mod_cont">
        <?php foreach ($fields['data'] as $data): ?>
            <div class="recont">
                <a href="/index/index/details.html?no=<?= $data['no'] ?>">
                    <div class="recimg">
                        <img src="<?= $data['image'][0] ?>"/>
                    </div>
                    <div class="redadat">
                        <p class="tit"><?= $data['title'] ?></p>
                        <p class="tit_txt"><?= $data['full_name'] ?>/<?= $data['areas'] ?>m²</p>
                        <p class="price"><?= $data['budget'] ?>￥</p>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--main end-->

<!--footer start-->
<div class="footer">
    <div class="footer_cont">
        Copyright © 2018 en.ink，All Rights Reserved.
        <br/> 四川亿能天成科技有限公司
    </div>
</div>
<!--footer end-->
</body>
</html>