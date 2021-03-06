<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>合伙人详情</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/cobber-field.css"/>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <?php \vendor\helpers\Msg::run('0.46rem') ?>
</head>
<body>
<!--header start-->
<div class="header">
    <a href="javascript:history.back(-1)" class="left pic">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <img src="/resources/img/logo.png"/>
    </a>
    <a href="/user/user/user.html" class="right pic">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </a>
</div>
<div class="background">
    <div class="cobberInfo">
        <div class="cobberHead"></div>
        <div class="cobberName"><?= $model->name ?></div>
        <div class="cobberMsg">电话:<?= $model->cobber->tel ?></div>
        <div class="cobberMsg">地址:<?= $model->address ?></div>
    </div>
</div>

<div class="ident">
    <div class="identInfo">2项平台认证</div>
    <div>
        <div class="left">实名认证</div>
        <div class="left">经济备案</div>
    </div>
</div>
<div class="title">
    TA的场地源
</div>
<?php foreach ($datas as $data): ?>
    <div class="content jump" url="/index/index/details.html?no=<?= $data['no'] ?>">
        <div class="contentImg">
            <img class="image" src="<?= explode(',', $data['image'])[0] ?>"/>
        </div>
        <div class="contentData">
            <p class="tit"><?= $data['title'] ?></p>
            <p class="tit_txt"><?= $data['full_name'] ?></p>
            <p class="tit_txt"><?= $data['minimal'] ?>￥起投 / <?= $data['park'] ?>车位</p>
            <p class="price"><?= $data['budget'] ?>￥</p>
        </div>
    </div>
<?php endforeach; ?>
<div class="addHeight"></div>
<div class="btns">
    <?php if (\vendor\en\FollowIdent::getFollowIdent($model->user_id, Yii::$app->user->id)): ?>
        <a class="btn" href="/user/follow/follow-cancel.html?cobber_id=<?= $model->user_id ?>">取消关注</a>
    <?php else: ?>
        <a class="btn" href="/user/follow/follow-cobber.html?cobber_id=<?= $model->user_id ?>">加关注</a>
    <?php endif; ?>
    &emsp;&emsp;
    <a class="btn btnOther" href="tel:<?= $model->cobber->tel ?>">打电话</a>
</div>
</body>
</html>