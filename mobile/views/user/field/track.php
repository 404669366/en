<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>场地跟踪列表</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/centerList.css"/>
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
    <div class="contentTitle">
        共<span> <?= count($field) ?> </span>个真实场地
        <?php if (\vendor\en\User::isCobber() === 2): ?>
            <p class="jump" url="/user/field/rob.html">抢单(<?= \vendor\helpers\redis::app()->lLen('BackendField') ?>)</p>
        <?php endif; ?>
    </div>
    <div class="contentList">
        <?php foreach ($field as $v): ?>
            <div class="one jump" url="/user/field/detail.html?no=<?= $v['no'] ?>">
                <div class="oneImg"><img src="<?= explode(',', $v['image'])[0] ?>"></div>
                <div class="oneInfo">
                    <div class="five">场地编号: <?= $v['no'] ?></div>
                    <div class="five">场地地域: <?= $v['full_name'] ?></div>
                    <div class="five">详细地址: <?= $v['address'] ?></div>
                    <div class="five">发布时间: <?= date('Y-m-d H:i:s', $v['created']) ?></div>
                    <div class="five">场地总额:
                        <span><?= $v['budget'] ?>&yen;</span>
                        /
                        <?= \vendor\helpers\Constant::getFieldStatus()[$v['status']] ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
