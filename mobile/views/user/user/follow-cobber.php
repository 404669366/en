<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>关注合伙人</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/attention_field.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
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

<!--main start-->
<div class="main">
    <div class="mainList">
        <!--title-->
        <div class="mainTit">
            共<span><?= count($follow) ?></span>个 关注合伙人
        </div>
        <?php foreach ($follow as $v): ?>
            <div class="listCont">
                <a href="/index/index/cobber-field.html?cobber_id=<?= $v['cobber_id'] ?>">
                    <img src="/resources/img/agent_none.png"/>
                    <div class="information">
                        <p><span>手机号:</span><?= $v['tel'] ?></p>
                        <p><span>姓名:</span><?= $v['name'] ?></p>
                        <p><span>关注时间:</span><?= date('Y-m-d H:i:s', $v['created']) ?></p>
                        <p><span>场地源数量:</span><?= \vendor\en\User::getCobberFieldCount(Yii::$app->user->id) ?></p>
                    </div>
                </a>
                <a href="/user/follow/follow-cancel.html?cobber_id=<?= $v['cobber_id'] ?>" class="cancel">
                    取消关注
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--main end-->
</body>
</html>
