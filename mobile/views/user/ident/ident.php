<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>认证合伙人</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
    <script>getRem(true);</script>
    <script src="/resources/js/form.js" type="text/javascript" charset="utf-8"></script>
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
        认证合伙人
    </div>
    <?php if (!$model): ?>
        <form class="contentForm" action="/user/ident/add-ident.html" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <input type="hidden" name="now_type" value="1">
            <input type="text" name="name" placeholder="请填写真实姓名"/>
            <input type="text" class="area" placeholder="请选择: 省>市>区/县"/>
            <input type="text" name="address" placeholder="请填写详细地址"/>
            <input type="text" class="bankType" placeholder="请选择: 开户银行"
                   data='<?= json_encode(\vendor\helpers\Constant::getBankType()) ?>'/>
            <input type="text" name="bank_no" placeholder="请填写收款银行卡号"/>
            <input type="text" class="card_positive" placeholder="身份证正面: 点击上传"/>
            <input type="text" class="card_opposite" placeholder="身份证反面: 点击上传"/>
            <div class="smallTitle isNow">申请正式合伙人</div>
            <div class="smallTitle notNow isNowShow" style="display: none">暂不申请</div>
            <input type="text" class="money_ident isNowShow" style="display: none" placeholder="打款凭证: 点击上传"/>
            <script>
                $('.isNow').click(function () {
                    $(this).hide();
                    $('.isNowShow').fadeIn();
                    $('[name="now_type"]').val(2);
                    $('body').animate({scrollTop: $('.contentForm').prop("scrollHeight")}, 800);
                });
                $('.notNow').click(function () {
                    $('.isNow').fadeIn();
                    $('[name="now_type"]').val(1);
                    $('.isNowShow').hide();
                });
            </script>
            <button type="submit">保存修改</button>
        </form>
        <script>
            window.area().load('.area', 'area_id');
            window.select().load('.bankType', 'bank_type');
            window.uploadImg().load('.card_positive', 'card_positive');
            window.uploadImg().load('.card_opposite', 'card_opposite');
            window.uploadImg().load('.money_ident', 'money_ident', 3);
        </script>
    <?php else: ?>
        <form class="contentForm" action="/user/ident/add-ident.html?id=<?= $model->id ?>" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <input type="text" readonly
                   value="认证状态: <?= \vendor\helpers\Constant::getCobberStatus()[$model->status] ?>"/>
            <input type="text" readonly value="真实姓名: <?= $model->name ?>"/>
            <input type="text" readonly value="所在地域: <?= $model->area->full_name ?>"/>
            <input type="text" readonly value="详细地址: <?= $model->address ?>"/>
            <input type="text" readonly
                   value="开户银行: <?= \vendor\helpers\Constant::getBankType()[$model->bank_type] ?>"/>
            <input type="text" readonly value="银行卡号: <?= $model->bank_no ?>"/>
            <input type="text" class="card_positive" readonly value="身份证正面: 点击查看"
                   data="<?= $model->card_positive ?>?>"/>
            <input type="text" class="card_opposite" readonly value="身份证反面: 点击查看"
                   data="<?= $model->card_opposite ?>?>"/>
            <?php if ($model->status == 1): ?>
                <div class="smallTitle isNow">申请正式合伙人</div>
                <div class="smallTitle notNow isNowShow" style="display: none">暂不申请</div>
                <input type="text" class="money_ident isNowShow" style="display: none" placeholder="打款凭证: 点击上传"/>
                <button class="isNowShow" type="submit" style="display: none">保存修改</button>
                <script>
                    window.uploadImg().load('.money_ident', 'money_ident', 3);
                    $('.isNow').click(function () {
                        $(this).hide();
                        $('.isNowShow').fadeIn();
                        $('body').animate({scrollTop: $('.contentForm').prop("scrollHeight")}, 800);
                    });
                    $('.notNow').click(function () {
                        $('.isNow').fadeIn();
                        $('.isNowShow').hide();
                    });
                </script>
            <?php endif; ?>
            <?php if (in_array($model->status, [3, 4, 5])): ?>
                <input type="text" class="money_ident" readonly value="打款凭证: 点击查看"
                       data="<?= $model->money_ident ?>?>"/>
                <script>
                    window.wall().load('.money_ident');
                </script>
            <?php endif; ?>
            <?php if (in_array($model->status, [0, 2, 5])): ?>
                <?php if ($model->status != 0): ?>
            <input type="text" class="remark" readonly placeholder="驳回说明: 点击查看"
                   data="<?= $model->remark ?>"/>
                <script>
                    window.intro().load('.remark');
                </script>
            <?php endif; ?>
                <a href="/user/ident/del-ident.html">撤销认证</a>
            <?php endif; ?>
        </form>
        <script>
            window.wall().load('.card_positive');
            window.wall().load('.card_opposite');
        </script>
    <?php endif; ?>
</div>
</body>
</html>
