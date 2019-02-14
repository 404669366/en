<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>场地跟踪详情</title>
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/head.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/release_venue.css"/>
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/area.js" type="text/javascript" charset="utf-8"></script>
    <script src="/upload/h5-upload.js" type="text/javascript" charset="utf-8"></script>
    <script src="/sinlar/sinlar.js" type="text/javascript" charset="utf-8"></script>


    <?php \vendor\helpers\Msg::run() ?>
</head>
<body>
<!--header start-->
<div class="header">
    <!--个人中心-->
    <div class="personal">
        <a href="javascript:history.back(-1)">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <img src="/resources/img/logo.png"/>
        </a>
        <p>
            <a href="/user/user/user.html">
                <i class="fa fa-user-o" aria-hidden="true"></i>
            </a>
        </p>
    </div>
</div>
<!--header end-->

<!--certified_Partners start-->
<div class="certified">
    <div class="partnersBox">
        <div class="partnersTit">
            意向详情
        </div>
        意向:<?= $data->no ?>
        <form action="/user/intention/detail.html?no=<?= $data->no ?>" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="oldPwd">
                <span>意向状态:</span>
                <input type="text"
                       placeholder="<?= \vendor\helpers\Constant::getIntentionStatus()[$data->status] ?>"
                       readonly>
            </div>
            <div class="oldPwd">
                <span>意向编号:</span>
                <input type="text" placeholder="<?= $data->no ?>" readonly>
            </div>
            <div class="oldPwd">
                <span>场地编号:</span>
                <input type="text" placeholder="<?= $data->field->no ?>" readonly>
            </div>
            <?php if (in_array($data->status, [2, 3])): ?>
                <div class="oldPwd area">
                    <span>预购金额:</span>
                    <input type="text" placeholder="<?= $data->money ?>" readonly>
                </div>
                <div class="oldPwd">
                    <span>分成比例:</span>
                    <input type="text" placeholder="<?= $data->ratio ?>" readonly>
                </div>
                <div class="field_info">
                    <p class="fieldTit">投资人合同:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $data->contract_photo) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="投资人合同<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="field_info">
                    <p class="fieldTit">打款凭证:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $data->money_audit) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="打款凭证<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (in_array($data->status, [0, 4])): ?>
                <div class="oldPwd area">
                    <span>预购金额:</span>
                    <input type="text" name="money" validate="notNull" maxlength="20"
                           value="<?= $data->money ?>">
                </div>
                <div class="oldPwd">
                    <span>分成比例:</span>
                    <input type="text" name="ratio" validate="notNull" maxlength="20"
                           value="<?= $data->ratio ?>">
                </div>
                <div class="field_info contract_photo">
                    <p class="fieldTit">投资人合同:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.contract_photo',
                                name: 'contract_photo',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$data->contract_photo?>`
                            });
                        </script>
                    </p>
                </div>
                <div class="field_info money_audit">
                    <p class="fieldTit">打款凭证:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.money_audit',
                                name: 'money_audit',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$data->money_audit?>`
                            });
                        </script>
                    </p>
                </div>
            <?php endif; ?>

            <?php if ($data->status == 4): ?>
                <div class="oldPwd">
                    <span>驳回说明:</span>
                    <textarea
                            style="height: 20rem;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);"
                            readonly><?= $data->remark ?></textarea>
                </div>
            <?php endif; ?>
            <?php if (in_array($data->status, [0, 4])): ?>
                <button type="submit"
                        style="font-size: 2rem;background-color: #3072f6;border-radius: 5px;width: 18%;height: 5rem;color: white;margin-top: 1rem;">
                    确认提交
                </button>
            <?php if ($data->status == 0): ?>
                <button type="button" class="del"
                        style="font-size: 2rem;background-color: #FF4136;border-radius: 5px;width: 18%;height: 5rem;color: white;margin-top: 1rem">
                    放弃
                </button>
                <div class="intent"
                     style="display: none;width: 100%;height: 100%;position: fixed;z-index: 998;background: rgba(0, 0, 0, 0.7);;top: 0;left: 0">
                    <div style="width: 68%;height: 48rem;background: #fcfcfc;margin: 30rem auto;border-radius: 3px;position: relative">
                        <div class="close"
                             style="position: absolute;right: 1.5rem;top: 1.5rem;height: 3rem;line-height: 3rem;width: 3rem;text-align: center;cursor: pointer;z-index: 999">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </div>
                        <div style="width: 100%;height: 50rem;position: absolute;top: 35px;padding: 0 1rem;box-sizing: border-box">
                            <span style="width: 100%;text-align: center;height: 4rem;line-height: 4rem;font-size: 2rem;display: inline-block">放弃说明</span>
                            <textarea class="explain"
                                      style="width: 80%;height: 33rem;line-height: 2rem;font-size: 1.6rem;display: block;margin: 1rem auto;"
                                      placeholder="请填写放弃说明"></textarea>
                            <span style="width: 100%;text-align: center;font-size: 16px;display: inline-block;">
                <button class="up" type="button"
                        style="border: none;border-radius:3px;color: white;background-color: #3072F6;width: 50%;display: inline-block;height: 4rem;line-height: 4rem;font-size:2rem;float: none">确认</button>
            </span>
                        </div>
                    </div>
                    `
                </div>
                <script>
                    $(function () {
                        $('.del').click(function () {
                            $('.intent').fadeIn();
                        });
                        $('.close').click(function () {
                            $('.intent').fadeOut();
                        });
                        $('.up').click(function () {
                            if ($('.explain').val()) {
                                $.getJSON('/user/field/del.html', {
                                    no: '<?=$data->no?>',
                                    remark: $('.explain').val()
                                }, function (re) {
                                    if (re.type) {
                                        layer.msg('提交成功');
                                        window.location.href = '/user/field/track-field.html';
                                    } else {
                                        layer.msg(re.msg);
                                    }
                                    $('.intent').fadeOut();
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
</div>
<!--certified_Partners end-->
</body>
</html>
