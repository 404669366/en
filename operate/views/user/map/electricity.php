<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>电价详情</title>
    <link rel="stylesheet" href="/resources/css/electricity.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
</head>
<body>
<div class="ele_head">
    电价详情
</div>
<ul class="electricity_list">
    <li>
        <p class="gray_txt">时间段</p>
        <p class="gray_txt">电&emsp;费(元/度)</p>
        <p class="gray_txt">服务费(元/度)</p>
    </li>
    <?php foreach ($data as $v):?>
    <li>
        <p><?=str_pad(floor($v['start']/3600),2,'0',STR_PAD_LEFT)?>:<?=str_pad(($v['start']%3600)/60,2,'0',STR_PAD_LEFT)?>
            -<?=str_pad(floor($v['end']/3600),2,'0',STR_PAD_LEFT)?>:<?=str_pad(($v['end']%3600)/60,2,'0',STR_PAD_LEFT)?></p>
        <p><?=$v['electrovalence']?></p>
        <p><?=$v['service']?></p>
    </li>
    <?php endforeach;?>
</ul>
</body>
</html>