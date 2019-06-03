<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>充值记录</title>
    <link rel="stylesheet" href="/resources/css/recharge_record.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
</head>
<body>
<ul class="recharge_list">
    <?php foreach ($model as $v): ?>
        <li>
            <p>
                <span class="fl"><?= \vendor\helpers\Constant::getSource()[$v['source']] ?>:<?=\vendor\helpers\Constant::getRecordStatus()[$v['status']]?></span>
                <span class="fr red_txt">充值金额: <?= explode('.', (string)(sprintf('%.2f', $v['money'])))[0] ?>
                    .<?= explode('.', (string)(sprintf('%.2f', $v['money'])))[1] ?></span>
            </p>
            <p>
                <span class="fl"><?= date('Y.m.d H:i:s', $v['created']) ?></span>
                <span class="fr gray_txt">当前余额: <?= explode('.', (string)(sprintf('%.2f', $v['balance'])))[0] ?>
                    .<?= explode('.', (string)(sprintf('%.2f', $v['balance'])))[1] ?></span>
            </p>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>