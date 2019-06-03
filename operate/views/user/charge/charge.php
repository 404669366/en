<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>充电状态</title>
    <link rel="stylesheet" href="/resources/css/charge.css">
    <link rel="stylesheet" href="/resources/css/radialIndicator.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
    <script type="text/javascript" src="/resources/js/radialindicator.js"></script>
</head>
<body>
<!--<div class="charge_head">-->
<!--    充电状态-->
<!--</div>-->
<input type="file" accept="image/*" capture="camera">
<input type="file" accept="video/*" capture="camcorder">
<div class="content">
    <p>蟹岛度假村快充2号充电站</p>
    <div id="demo">
        <div class="name">
            4.8
        </div>
        <div class="charge_txt">充电量(度)</div>
        <div class="bolt">
            <span><i class="fa fa-bolt" aria-hidden="true"></i></span>
        </div>
    </div>
</div>
<script>
    var a = $('#demo').radialIndicator().data('radialIndicator');
    setInterval(function () {
        var now = getRandom(100);
        $('.name').text(now+'%');
        a.value(now);
    },1000);
    function getRandom(n){
        return Math.floor(Math.random()*n+1)
    }
</script>
<ul class="charge_process">
    <li>
        <p>37.09</p>
        电流(A)
    </li>
    <li>
        <p>366.8</p>
        电压(V)
    </li>
    <li>
        <p>53%</p>
        当前电量
    </li>
</ul>
<ul class="charge_time">
    <li>
        <span class="fl"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
        <span class="fl">充电时间</span>
        <span class="fr">00:11:48</span>
    </li>
    <li>
        <span class="fl"><i class="fa fa-jpy" aria-hidden="true"></i></span>
        <span class="fl">充电金额(元)</span>
        <span class="fr green_txt">9.02</span>
    </li>
</ul>
<!--footer-->
<div class="charge_end">
    结束充电
</div>
</body>
</html>