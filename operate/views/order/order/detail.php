<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <link rel="stylesheet" href="/resources/css/order_details.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
</head>
<body>
<?php if ($model && isset($model)):?>
<div class="order">
    <div class="order_details">
        <div class="order_tit">
            <p class="fl"><span></span>订单详情</p><p class="fr unpaid" style="background: #00A8EC">已支付</p>
        </div>
        <ul>
            <li>
                <span>订单编号:</span>
                <p><?=$model->no?></p>
            </li>
            <li>
                <span>电桩编号:</span>
                <p><?=$model->electricize_no?></p>
            </li><li>
                <span>枪口号:</span>
                <p><?=$model->gun_no?></p>
            </li>
            <li>
                <span>订单总价:</span>
                <p class="txt_red">&yen;<?=$model->all_price?></p>
            </li>
            <li>
                <span>服务费:</span>
                <p class="txt_red">&yen;<?=$model->all_service?></p>
            </li>
            <li>
                <span>充电量:</span>
                <p><?=$model->all_elec?></p>
            </li>
            <li>
                <span>开始时间:</span>
                <p><?=date('Y-m-d H:i:s',$model->begin_at)?></p>
            </li>
            <li>
                <span>结束时间:</span>
                <p><?=date('Y-m-d H:i:s',$model->end_at)?></p>
            </li>
        </ul>
    </div>
    <div class="order_time">
        <span>下单时间:</span>
        <p><?=date('Y-m-d H:i:s',$model->created)?></p>
    </div>
</div>
<?php endif;?>

<?php if ($data && isset($data)):?>
<div class="order"  style="display: none">
    <div class="order_details">
        <div class="order_tit">
            <p class="fl"><span></span>订单详情</p><p class="fr unpaid" style="background: #FF4C38">未支付</p>
        </div>
        <ul>
            <li>
                <span>订单编号:</span>
                <p><?=$data['no']?></p>
            </li>
            <li>
                <span>电桩编号:</span>
                <p><?=$data['ele_no']?></p>
            </li><li>
                <span>枪口号:</span>
                <p><?=$data['gun_no']?></p>
            </li>
            <li>
                <span>订单总价:</span>
                <p class="txt_red">&yen;<?=$data['all_price']?></p>
            </li>
            <li>
                <span>服务费:</span>
                <p class="txt_red">&yen;<?=$data['all_service']?></p>
            </li>
            <li>
                <span>充电量:</span>
                <p><?=$data['all_ele']?></p>
            </li>
            <li>
                <span>开始时间:</span>
                <p><?=date('Y-m-d H:i:s',$data['begin_at'])?></p>
            </li>
            <li>
                <span>结束时间:</span>
                <p><?=date('Y-m-d H:i:s',$data['end_at'])?></p>
            </li>
        </ul>
    </div>
    <div class="order_time">
        <span>下单时间:</span>
        <p><?=date('Y-m-d H:i:s',$data['created'])?></p>
    </div>
    <div class="pay">立即支付</div>
</div>
<?php endif;?>
</body>
</html>