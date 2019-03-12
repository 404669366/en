<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>收益预测</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/estimate.css"/>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>getRem(true);</script>
    <?php \vendor\helpers\Msg::run('0.46rem') ?>
</head>
<body>
<div class="header">
    <a href="javascript:history.back(-1)" class="left picFont">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
    </a>
    <a href="javascript:history.back(-1)" class="left pic">
        <span>
            <img src="/resources/img/logo.png"/>
        </span>
    </a>
    <a href="/user/user/user.html" class="right picFont">
        <i class="fa fa-user-o" aria-hidden="true"></i>
    </a>
</div>
<table border="1" class="estimate">
    <tr>
        <td colspan="13" class="tit">充电站收益测算表</td>
    </tr>
    <tr>
        <td colspan="2">投建功率:</td>
        <td colspan="2" class="power"></td>
        <td colspan="2">变压器:</td>
        <td colspan="2" class="transformer"></td>
        <td colspan="2">总投资额:</td>
        <td colspan="3" class="total"></td>
    </tr>
    <tr>
        <td colspan="2">盈利增值:</td>
        <td colspan="2" class="raiseRatio"></td>
        <td colspan="2">场地分成:</td>
        <td colspan="2" class="field"></td>
        <td colspan="3">三费(平台,代运营,运维):</td>
        <td colspan="2" class="roof"></td>
    </tr>
    <tr>
        <td colspan="2">电损:</td>
        <td colspan="2" class="pLoss"></td>
        <td colspan="2">服务费:</td>
        <td colspan="2" class="servers"></td>
        <td colspan="3">日均使用时长:</td>
        <td colspan="2" class="dayHours"></td>
    </tr>
    <tr>
        <td rowspan="2">类别</td>
        <td rowspan="2">项目</td>
        <td rowspan="2">单位</td>
        <td rowspan="2">合计</td>
        <td>建设期(年)</td>
        <td colspan="8">经营期(年)</td>
    </tr>
    <tr>
        <td>0</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
    </tr>
    <tr>
        <td rowspan="2">项目投资额</td>
        <td>设备购置</td>
        <td>万元</td>
        <td class="totals"></td>
        <td class="totals"></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>固定资产年度折旧额</td>
        <td>万元</td>
        <td class="totals"></td>
        <td></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
        <td class="depreciation"></td>
    </tr>
    <tr>
        <td rowspan="3">经营现金流入</td>
        <td>充电服务费收益</td>
        <td>万元</td>
        <td class="serviceChargeAll"></td>
        <td></td>
        <td class="serviceCharge1"></td>
        <td class="serviceCharge2"></td>
        <td class="serviceCharge3"></td>
        <td class="serviceCharge4"></td>
        <td class="serviceCharge5"></td>
        <td class="serviceCharge6"></td>
        <td class="serviceCharge7"></td>
        <td class="serviceCharge8"></td>
    </tr>
    <tr>
        <td>财政补贴</td>
        <td>万元</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>其他(广告,集客等)</td>
        <td>万元</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td rowspan="4">经营现金流出</td>
        <td>场地方分成</td>
        <td>万元</td>
        <td class="fieldCommissionAll"></td>
        <td></td>
        <td class="fieldCommission1"></td>
        <td class="fieldCommission2"></td>
        <td class="fieldCommission3"></td>
        <td class="fieldCommission4"></td>
        <td class="fieldCommission5"></td>
        <td class="fieldCommission6"></td>
        <td class="fieldCommission7"></td>
        <td class="fieldCommission8"></td>
    </tr>
    <tr>
        <td>三费</td>
        <td>万元</td>
        <td class="roofCommissionAll"></td>
        <td></td>
        <td class="roofCommission1"></td>
        <td class="roofCommission2"></td>
        <td class="roofCommission3"></td>
        <td class="roofCommission4"></td>
        <td class="roofCommission5"></td>
        <td class="roofCommission6"></td>
        <td class="roofCommission7"></td>
        <td class="roofCommission8"></td>
    </tr>
    <tr>
        <td>电损</td>
        <td>万元</td>
        <td class="powerLossAll"></td>
        <td></td>
        <td class="powerLoss1"></td>
        <td class="powerLoss2"></td>
        <td class="powerLoss3"></td>
        <td class="powerLoss4"></td>
        <td class="powerLoss5"></td>
        <td class="powerLoss6"></td>
        <td class="powerLoss7"></td>
        <td class="powerLoss8"></td>
    </tr>
    <tr>
        <td>保险费</td>
        <td>万元</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>现金流净值</td>
        <td>年度净现金流量</td>
        <td>万元</td>
        <td class="moneyFlowAll"></td>
        <td></td>
        <td class="moneyFlow1"></td>
        <td class="moneyFlow2"></td>
        <td class="moneyFlow3"></td>
        <td class="moneyFlow4"></td>
        <td class="moneyFlow5"></td>
        <td class="moneyFlow6"></td>
        <td class="moneyFlow7"></td>
        <td class="moneyFlow8"></td>
    </tr>
    <tr>
        <td>净利润</td>
        <td>年度净利润总额</td>
        <td>万元</td>
        <td class="yearProfitAll"></td>
        <td class="delTotals"></td>
        <td class="yearProfit1"></td>
        <td class="yearProfit2"></td>
        <td class="yearProfit3"></td>
        <td class="yearProfit4"></td>
        <td class="yearProfit5"></td>
        <td class="yearProfit6"></td>
        <td class="yearProfit7"></td>
        <td class="yearProfit8"></td>
    </tr>
</table>
<input type="text" class="powers" placeholder="请填写预计投建功率(kw)">
<input type="text" class="hours" placeholder="请填写日均时长(小时)">
<div class="click">立即预测</div>
<script>
    $('.click').click(function () {
        var power = $('.powers').val();
        if (!power || isNaN(power)) {
            layer.msg('<span style="font-size:0.4rem;height:100%;line-height:100%">请填写正确的功率</span>');
            return;
        }
        var hours = $('.hours').val();
        if (!hours || isNaN(hours)) {
            layer.msg('<span style="font-size:0.4rem;height:100%;line-height:100%">请填写正确的时长</span>');
            return;
        }
        if (hours > 24) {
            layer.msg('<span style="font-size:0.4rem;height:100%;line-height:100%">时长最大24小时</span>');
            return;
        }
        $.getJSON('/estimate/estimate/data.html', {power: power, hours: hours}, function (re) {
            if (re.type) {
                $('.power').text(re.data.config.power + 'kw');
                $('.transformer').text(re.data.config.transformer);
                $('.total').text(re.data.config.total.toFixed(2) + '万元');
                $('.raiseRatio').text(re.data.config.raiseRatio * 100 + '%');
                $('.field').text(re.data.config.field * 100 + '%');
                $('.roof').text(re.data.config.roof * 100 + '%');
                $('.pLoss').text((re.data.config.pLoss * 100).toFixed(0) + '%');
                $('.dayHours').text(re.data.config.dayHours + '小时');
                $('.servers').text(re.data.config.servers.toFixed(2) + '元');
                $('.totals').text(re.data.config.total.toFixed(2));
                $('.delTotals').text('-' + re.data.config.total.toFixed(2));
                $('.depreciation').text(re.data.data.depreciation.toFixed(2));
                $('.serviceChargeAll').text(re.data.data.serviceChargeAll.toFixed(2));
                $('.serviceCharge1').text(re.data.data.serviceCharge[1].toFixed(2));
                $('.serviceCharge2').text(re.data.data.serviceCharge[2].toFixed(2));
                $('.serviceCharge3').text(re.data.data.serviceCharge[3].toFixed(2));
                $('.serviceCharge4').text(re.data.data.serviceCharge[4].toFixed(2));
                $('.serviceCharge5').text(re.data.data.serviceCharge[5].toFixed(2));
                $('.serviceCharge6').text(re.data.data.serviceCharge[6].toFixed(2));
                $('.serviceCharge7').text(re.data.data.serviceCharge[7].toFixed(2));
                $('.serviceCharge8').text(re.data.data.serviceCharge[8].toFixed(2));
                $('.fieldCommissionAll').text(re.data.data.fieldCommissionAll.toFixed(2));
                $('.fieldCommission1').text(re.data.data.fieldCommission[1].toFixed(2));
                $('.fieldCommission2').text(re.data.data.fieldCommission[2].toFixed(2));
                $('.fieldCommission3').text(re.data.data.fieldCommission[3].toFixed(2));
                $('.fieldCommission4').text(re.data.data.fieldCommission[4].toFixed(2));
                $('.fieldCommission5').text(re.data.data.fieldCommission[5].toFixed(2));
                $('.fieldCommission6').text(re.data.data.fieldCommission[6].toFixed(2));
                $('.fieldCommission7').text(re.data.data.fieldCommission[7].toFixed(2));
                $('.fieldCommission8').text(re.data.data.fieldCommission[8].toFixed(2));
                $('.roofCommissionAll').text(re.data.data.roofCommissionAll.toFixed(2));
                $('.roofCommission1').text(re.data.data.roofCommission[1].toFixed(2));
                $('.roofCommission2').text(re.data.data.roofCommission[2].toFixed(2));
                $('.roofCommission3').text(re.data.data.roofCommission[3].toFixed(2));
                $('.roofCommission4').text(re.data.data.roofCommission[4].toFixed(2));
                $('.roofCommission5').text(re.data.data.roofCommission[5].toFixed(2));
                $('.roofCommission6').text(re.data.data.roofCommission[6].toFixed(2));
                $('.roofCommission7').text(re.data.data.roofCommission[7].toFixed(2));
                $('.roofCommission8').text(re.data.data.roofCommission[8].toFixed(2));
                $('.powerLossAll').text(re.data.data.powerLossAll.toFixed(2));
                $('.powerLoss1').text(re.data.data.powerLoss[1].toFixed(2));
                $('.powerLoss2').text(re.data.data.powerLoss[2].toFixed(2));
                $('.powerLoss3').text(re.data.data.powerLoss[3].toFixed(2));
                $('.powerLoss4').text(re.data.data.powerLoss[4].toFixed(2));
                $('.powerLoss5').text(re.data.data.powerLoss[5].toFixed(2));
                $('.powerLoss6').text(re.data.data.powerLoss[6].toFixed(2));
                $('.powerLoss7').text(re.data.data.powerLoss[7].toFixed(2));
                $('.powerLoss8').text(re.data.data.powerLoss[8].toFixed(2));
                $('.moneyFlowAll').text(re.data.data.moneyFlowAll.toFixed(2));
                $('.moneyFlow1').text(re.data.data.moneyFlow[1].toFixed(2));
                $('.moneyFlow2').text(re.data.data.moneyFlow[2].toFixed(2));
                $('.moneyFlow3').text(re.data.data.moneyFlow[3].toFixed(2));
                $('.moneyFlow4').text(re.data.data.moneyFlow[4].toFixed(2));
                $('.moneyFlow5').text(re.data.data.moneyFlow[5].toFixed(2));
                $('.moneyFlow6').text(re.data.data.moneyFlow[6].toFixed(2));
                $('.moneyFlow7').text(re.data.data.moneyFlow[7].toFixed(2));
                $('.moneyFlow8').text(re.data.data.moneyFlow[8].toFixed(2));
                $('.yearProfitAll').text(re.data.data.yearProfitAll.toFixed(2));
                $('.yearProfit1').text(re.data.data.yearProfit[1].toFixed(2));
                $('.yearProfit2').text(re.data.data.yearProfit[2].toFixed(2));
                $('.yearProfit3').text(re.data.data.yearProfit[3].toFixed(2));
                $('.yearProfit4').text(re.data.data.yearProfit[4].toFixed(2));
                $('.yearProfit5').text(re.data.data.yearProfit[5].toFixed(2));
                $('.yearProfit6').text(re.data.data.yearProfit[6].toFixed(2));
                $('.yearProfit7').text(re.data.data.yearProfit[7].toFixed(2));
                $('.yearProfit8').text(re.data.data.yearProfit[8].toFixed(2));
                layer.msg('<span style="font-size:0.4rem;height:100%;line-height:100%">收益测算成功</span>');
            } else {
                layer.msg('<span style="font-size:0.4rem;height:100%;line-height:100%">系统故障请稍后再试</span>');
            }
        });
    });
</script>
</body>
</html>
