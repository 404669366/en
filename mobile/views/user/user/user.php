<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>个人中心</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/resources/css/center.css">
    <?php \vendor\helpers\Msg::run('0.46rem') ?>
</head>
<body>
<div class="header">
    <a href="javascript:history.back(-1)" class="pic">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <img src="/resources/img/logo.png"/>
    </a>
    <a href="/user/user/user.html" class="pic">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </a>
</div>
<div class="userInfo">
    <span><img src="/resources/img/user.png" alt=""><br><?= Yii::$app->user->identity->tel ?></span>
</div>
<div class="menuList">
    <div class="menu jump" url="/user/user/follow-cobber.html">
        <div class="icon" style="color:#7FD1CC;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
        <div class="name">关注合伙人</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <div class="menu jump" url="/user/user/follow.html">
        <div class="icon" style="color:#F7B086;"><i class="fa fa-star-half-o" aria-hidden="true"></i></div>
        <div class="name">关注场地</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <div class="menu jump" url="/user/user/basis-field.html">
        <div class="icon" style="color:#84CB7F;"><i class="fa fa-gavel" aria-hidden="true"></i></div>
        <div class="name">基础场地</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <div class="menu jump" url="/user/intention/list.html">
        <div class="icon" style="color:#7FD1CC;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
        <div class="name">我的意向</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <?php if (\vendor\en\User::isCobber()): ?>
        <div class="menu jump" url="/user/release/release.html">
            <div class="icon" style="color:#FFCE44;"><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
            <div class="name">发布场地</div>
            <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
        <div class="menu jump" url="/user/field/track-field.html">
            <div class="icon" style="color:#DE5448;"><i class="fa fa-video-camera" aria-hidden="true"></i></div>
            <div class="name">场地跟踪</div>
            <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
        <div class="menu jump" url="/user/intention/manage.html">
            <div class="icon" style="color:#6DB8F7;"><i class="fa fa-hourglass-half" aria-hidden="true"></i></div>
            <div class="name">意向管理</div>
            <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
    <?php endif; ?>
    <div class="menu jump" url="/user/user/update.html">
        <div class="icon" style="color:#17A05E;"><i class="fa fa-unlock" aria-hidden="true"></i></div>
        <div class="name">修改密码</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
    <div class="menu jump" url="/user/ident/ident.html">
        <div class="icon" style="color: #4371FB;"><i class="fa fa-users" aria-hidden="true"></i></div>
        <div class="name">认证合伙人</div>
        <div class="goIcon"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
    </div>
</div>
<div class="logout jump" url="/login/login/logout.html">退出登录</div>
</body>
</html>
