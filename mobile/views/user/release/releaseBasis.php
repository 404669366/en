<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>发布场地</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/release_venue.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/area.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run() ?>
</head>
<body>
<!--header start-->
<div class="header">
    <!--个人中心-->
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

<!--certified_Partners start-->
<div class="certified">
    <form action="/user/release/add-basis.html" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="partnersBox">
            <div class="partnersTit">
                发布场地
            </div>
            <div class="oldPwd area">
                <span>场地地域:</span>
                <select class="province"
                        style="width: auto;text-align: center;text-align-last: center"></select>
                <select class="city"
                        style="width: auto;text-align: center;text-align-last: center"></select>
                <select class="county"
                        style="width: auto;text-align: center;text-align-last: center"></select>
            </div>
            <div class="oldPwd">
                <span>详细地址:</span>
                <input type="text" name="address" placeholder="请填写详细地址"/>
            </div>
            <!--场地介绍-->
            <div class="field_info">
                <p class="fieldTit">场地介绍:</p>
                <textarea class="field_cont" name="intro" placeholder="请填写场地介绍"></textarea>
            </div>
            <div class="oldPwd">
                <button type="submit">确认提交</button>
            </div>
        </div>
    </form>
</div>
<!--certified_Partners end-->
</body>
</html>
