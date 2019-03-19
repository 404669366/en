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
        场地跟踪详情
    </div>
    <form class="contentForm" action="/user/field/update.html?no=<?= $field->no ?>" method="post">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="text" readonly
               value="场地编号: <?= $field->no ?>&emsp;<?= \vendor\helpers\Constant::getFieldStatus()[$field->status] ?>"/>
        <input type="text" readonly
               value="场地类型: <?= \vendor\helpers\Constant::getFieldType()[$field->type] ?>"/>
        <input type="text" readonly
               value="场地标题: <?= $field->title ?>"/>
        <input type="text" readonly
               value="场地地域: <?= $field->area->full_name ?>"/>
        <input type="text" readonly
               value="详细地址: <?= $field->address ?>"/>
        <input type="text" class="intro" readonly value="场地介绍: 点击查看" data="<?= $field->intro ?>"/>
        <input type="text" class="image" readonly value="场地图片: 点击查看" data="<?= $field->image ?>"/>
        <?php if (in_array($field->status, [1, 6])): ?>
            <input type="text" readonly class="configure_photo" value="配置单图片: 点击编辑"
                   data="<?= $field->configure_photo ?>"/>
            <input type="text" readonly class="prove_photo" value="场地证明图片: 点击编辑" data="<?= $field->prove_photo ?>"/>
            <input type="text" readonly class="field_photo" value="场地合同图片: 点击编辑" data="<?= $field->field_photo ?>"/>
            <input type="text" placeholder="请填写分成比例" value="<?= $field->field_ratio ?>"/>
            <script>
                window.uploadImg().load('.configure_photo', 'configure_photo', 4);
                window.uploadImg().load('.prove_photo', 'prove_photo', 4);
                window.uploadImg().load('.field_photo', 'field_photo', 4);
            </script>
        <?php endif; ?>
        <?php if (in_array($field->status, [4, 5]) || $field->status >= 8): ?>
            <input type="text" readonly class="configure_photo" value="配置单图片: 点击查看"
                   data="<?= $field->configure_photo ?>"/>
            <input type="text" readonly class="prove_photo" value="场地证明图片: 点击查看" data="<?= $field->prove_photo ?>"/>
            <input type="text" readonly class="field_photo" value="场地合同图片: 点击查看" data="<?= $field->field_photo ?>"/>
            <input type="text" readonly value="分成比例: <?= $field->field_ratio ?>"/>
            <script>
                window.wall().load('.configure_photo');
                window.wall().load('.prove_photo');
                window.wall().load('.field_photo');
            </script>
        <?php endif; ?>
        <?php if ($field->status == 11 || $field->status >= 14): ?>
            <input type="text" readonly class="transformer_drawing" value="变压器图纸: 点击查看"
                   data="<?= $field->transformer_drawing ?>"/>
            <input type="text" readonly class="field_drawing" value="施工图纸: 点击查看" data="<?= $field->field_drawing ?>"/>
            <input type="text" readonly class="budget_photo" value="预算报表: 点击查看" data="<?= $field->budget_photo ?>"/>
            <input type="text" readonly value="规划车位: <?= $field->park ?>"/>
            <input type="text" readonly value="预算总金额: <?= $field->budget ?>"/>
            <input type="text" readonly value="起投金额: <?= $field->minimal ?>"/>
            <script>
                window.wall().load('.transformer_drawing');
                window.wall().load('.field_drawing');
                window.wall().load('.budget_photo');
            </script>
        <?php endif; ?>
        <?php if (in_array($field->status, [11, 16])): ?>
            <input type="text" readonly class="power_photo" placeholder="电力证明: 点击编辑"
                   data="<?= $field->power_photo ?>"/>
            <script>
                window.uploadImg().load('.power_photo', 'power_photo', 4);
            </script>
        <?php endif; ?>
        <?php if (in_array($field->status, [14, 15])): ?>
            <input type="text" readonly class="power_photo" value="电力证明: 点击查看"
                   data="<?= $field->power_photo ?>"/>
            <script>
                window.wall().load('.power_photo');
            </script>
        <?php endif; ?>
        <?php if (in_array($field->status, [6, 16])): ?>
            <input type="text" class="remark" readonly value="驳回说明: 点击查看" data="<?= $field->remark ?>"/>
            <script>
                window.intro().load('.remark');
            </script>
        <?php endif; ?>
        <?php if (in_array($field->status, [1, 6, 11, 15, 16])): ?>
            <?php if ($field->status != 15): ?>
            <button type="submit">确认提交</button>
        <?php endif; ?>
        <?php if ($field->status != 16): ?>
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
                            $.getJSON('/user/field/del.html', {
                                no: '<?=$field->no?>',
                                remark: $('.intentModalContent').val()
                            }, function (re) {
                                if (re.type) {
                                    layer.msg('提交成功');
                                    window.location.href = '/user/field/track-field.html';
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
    <script>
        window.intro().load('.intro');
        window.wall().load('.image');
    </script>
</div>
</body>
</html>
