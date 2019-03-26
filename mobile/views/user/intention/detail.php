<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>意向详情</title>
    <script src="/resources/js/common.js" type="text/javascript" charset="utf-8"></script>
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
        意向详情 (NO: <?= $data->no ?>)
    </div>
    <form class="contentForm" action="/user/intention/detail.html?no=<?= $data->no ?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="text" readonly value="场地编号: <?= $data->field->no ?>"/>
        <input type="text" readonly value="意向状态: <?= \vendor\helpers\Constant::getIntentionStatus()[$data->status] ?>"/>
        <?php if (in_array($data->status, [2, 3])): ?>
            <input type="text" readonly value="预购金额: <?= $data->money ?>"/>
            <input type="text" readonly value="分成比例: <?= $data->ratio ?>"/>
            <input type="text" readonly class="contract_photo" value="投资合同: 点击查看" data="<?= $data->contract_photo ?>"/>
            <input type="text" readonly class="money_audit" value="打款凭证: 点击查看" data="<?= $data->money_audit ?>"/>
            <script>
                window.wall().load('.contract_photo');
                window.wall().load('.money_audit');
            </script>
        <?php endif; ?>
        <?php if (in_array($data->status, [0, 4])): ?>
            <input type="text" name="money" placeholder="请填写预购金额" value="<?= $data->money ?>"/>
            <input type="text" name="ratio" placeholder="请填写分成比例" value="<?= $data->ratio ?>"/>
            <input type="text" readonly class="contract_photo" placeholder="投资合同: 点击编辑"
                   data="<?= $data->contract_photo ?>"/>
            <input type="text" readonly class="money_audit" placeholder="打款凭证: 点击编辑"
                   data="<?= $data->money_audit ?>"/>
            <script>
                window.uploadImg().load('.contract_photo', 'contract_photo', 4);
                window.uploadImg().load('.money_audit', 'money_audit', 4);
            </script>
        <?php endif; ?>
        <?php if ($data->status == 4): ?>
            <input type="text" class="remark" readonly value="驳回说明: 点击查看" data="<?= $data->remark ?>"/>
            <script>
                window.intro().load('.remark');
            </script>
        <?php endif; ?>
        <?php if (in_array($data->status, [0, 4])): ?>
            <button type="submit">确认提交</button>
        <?php if ($data->status == 0): ?>
            <button style="background:#FF4136" class="del" type="button">放弃</button>
            <div class="intentModalBox">
                <div class="intentModalTitle">放弃说明</div>
                <div class="intentModalClose"><i class="fa fa-times" aria-hidden="true"></i></div>
                <textarea class="intentModalContent"></textarea>
                <button type="button" class="intentModalOk">确认提交</button>
            </div>
            <script>
                $(function () {
                    $('.del').click(function () {
                        window.modal.open('.intentModalBox');
                    });
                    $('.intentModalClose').click(function () {
                        window.modal.close('.intentModalBox');
                    });
                    $('.intentModalOk').click(function () {
                        if ($('.intentModalContent').val()) {
                            $.getJSON('/user/intention/del.html', {
                                no: '<?=$data->no?>',
                                explain: $('.intentModalContent').val()
                            }, function (re) {
                                if (re.type) {
                                    layer.msg('提交成功');
                                    window.location.href = '/user/intention/manage.html';
                                } else {
                                    layer.msg(re.msg);
                                }
                                window.modal.close('.intentModalBox');
                            })
                        } else {
                            layer.msg('请填写放弃说明');
                        }
                    });
                });
            </script>
        <?php endif; ?>
        <?php endif; ?>
    </form>

</div>
</body>
</html>
