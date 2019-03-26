<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>关注合伙人列表</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
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
<div class="contentBox">
    <div class="contentTitle">共关注<span> <?= count($follow) ?> </span>个合伙人</div>
    <div class="contentList">
        <?php foreach ($follow as $v): ?>
            <div class="one jump" url="/index/index/cobber-field.html?cobber_id=<?= $v['cobber_id'] ?>">
                <div class="oneImg"><img src="/resources/img/agent_none.png"></div>
                <div class="oneInfo">
                    <div class="four">手机号: <?= $v['tel'] ?></div>
                    <div class="four">姓&emsp;名: <?= $v['name'] ?></div>
                    <div class="four">场地数量: <?= \vendor\en\User::getCobberFieldCount(Yii::$app->user->id) ?></div>
                    <div class="four">关注时间: <?= date('Y-m-d H:i:s', $v['created']) ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
