<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的订单</title>
    <link rel="stylesheet" href="/resources/css/my_orders.css">
    <script type="text/javascript" src="/resources/js/common.js"></script>
</head>
<body>
<?php foreach ($dataTwo as $v):?>
<div class="my_orders">
    <div class="label_one">已支付</div>
    <ul>
        <li>
            <span>订单编号:</span>
            <p><?=$v['no']?></p>
        </li>
        <li>
            <span>电桩编号:</span>
            <p><?=$v['electricize_no']?></p>
        </li>
        <li>
            <span>枪口号:</span>
            <p><?=$v['gun_no']?></p>
        </li>
        <li>
            <span>充电量:</span>
            <p><?=$v['all_elec']?></p>
        </li>
        <li>
            <span>充值金额:</span>
            <p><?=$v['all_price']?>元</p>
        </li>
        <li>
            <span>下单时间:</span>
            <p><?=date('Y-m-d H:i:s',$v['created'])?></p>
        </li>
    </ul>
    <div class="goto1 jump" url="/order/order/detail.html?id=<?=$v['id']?>">查看详情</div>
</div>
<?php endforeach;?>
<?php foreach ($dataOne as $k => $j) :?>
    <?php if( in_array($j['status'],[3,4])):?>
    <div class="my_orders">
        <div class="label_two">未支付</div>
        <ul>
            <li>
                <span>订单编号:</span>
                <p><?=$k?></p>
            </li>
            <li>
                <span>电桩编号:</span>
                <p><?=$j['no']?></p>
            </li>
            <li>
                <span>枪口号:</span>
                <p><?=$j['gun_no']?></p>
            </li>
            <li>
                <span>充电量:</span>
                <p><?=$j['all_elec']?></p>
            </li>
            <li>
                <span>充值金额:</span>
                <p><?=$j['all_price']?>元</p>

            <li>
                <span>下单时间:</span>
                <p><?=date('Y-m-d H:i:s',$j['created'])?></p>
            </li>
        </ul>
        <div class="goto2 jump" url="/order/order/detail.html?id=<?=$j['no']?>">前往支付</div>
    </div>
        <?php endif;?>
<?php endforeach;?>
<div class="my_orders">
    <div class="label_three">进行中</div>
    <ul>
        <li>
            <span>订单编号:</span>
            <p>123456789987654321</p>
        </li>
        <li>
            <span>订单金额:</span>
            <p>450元</p>
        </li>
        <li>
            <span>下单地址:</span>
            <p>成都市双流县充电站成都市双流县充电站</p>
        </li>
        <li>
            <span>购买数量:</span>
            <p>1</p>
        </li>
        <li>
            <span>下单时间:</span>
            <p>2019-05-15&nbsp;12:00</p>
        </li>

    </ul>
    <div class="goto3 jump" url="/user/charge/charge.html">查看详情</div>
</div>

<div class="no_order" style="display: none">
    <div class="main">
        <p><i class="fa fa-file-text-o" aria-hidden="true"></i></p>
        暂无订单记录
    </div>
</div>
</body>
</html>