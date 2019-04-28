<?php $this->registerJsFile('/qrCode/qrCode.js', ['depends' => 'app\assets\ModelAsset']); ?>
<style>
    .green, .red {
        width: 0.8rem;
        height: 0.8rem;
        border-radius: 50%;
        background: greenyellow;
        display: inline-block;
        -webkit-filter: blur(2px);
        -moz-filter: blur(2px);
        -ms-filter: blur(2px);
        filter: blur(2px);
    }

    .red {
        background: red;
    }

    .row > .col-md-3 {
        font-size: 16px;
    }
</style>
<div class="ibox-content" style="position:relative;margin-bottom: 1rem">
    <h2>NO: <?= $no ?></h2>
    <h4><?= date('Y-m-d H:i:s', $data['time']) ?></h4>
    <div style="position: absolute;right: 1rem;top:4.4rem;width: 20rem;height: 3rem;">
        <div class="green"></div>
        无故障&emsp;<div class="red"></div>
        有故障
    </div>
</div>
<div class="ibox-content" style="margin-bottom: 1rem">
    <h2 class="page-header">故障信息</h2>
    <div class="row">
        <?php foreach ($data[2] as $k => $v): ?>
            <div class="col-md-3 col-sm-4">
                <?= \vendor\helpers\Constant::getTroubleCode()[$k] ?>:
                <div class="<?= \vendor\helpers\Constant::getTroubleStatus()[$v] ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="ibox-content" style="margin-bottom: 1rem">
    <h2 class="page-header">告警信息</h2>
    <div class="row">
        <?php foreach ($data[1] as $k => $v): ?>
            <div class="col-md-3 col-sm-4">
                <?= \vendor\helpers\Constant::getTroubleCode()[$k] ?>:
                <div class="<?= \vendor\helpers\Constant::getTroubleStatus()[$v] ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="ibox-content" style="margin-bottom: 1rem">
    <h2 class="page-header">保护信息</h2>
    <div class="row">
        <?php foreach ($data[0] as $k => $v): ?>
            <div class="col-md-3 col-sm-4">
                <?= \vendor\helpers\Constant::getTroubleCode()[$k] ?>:
                <div class="<?= \vendor\helpers\Constant::getTroubleStatus()[$v] ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div class="ibox-content" style="text-align: center">
    <button class="btn btn-info back">返回</button>
</div>
