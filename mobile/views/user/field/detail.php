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
        <a href="/user/user/user.html">
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
            场地跟踪详情
        </div>
        场地编号:
        <?= $field->no ?>&emsp;<?= \vendor\helpers\Constant::getFieldStatus()[$field->status] ?>
        <form action="/user/field/update.html?no=<?= $field->no ?>" method="post">
            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
            <div class="oldPwd">
                <span>场地类型:</span>
                <input type="text" placeholder="<?= \vendor\helpers\Constant::getFieldType()[$field->type] ?>"
                       readonly>
            </div>
            <div class="oldPwd">
                <span>场地标题:</span>
                <input type="text" placeholder="<?= $field->title ?>" readonly>
            </div>
            <div class="oldPwd">
                <span>场地地域:</span>
                <input type="text" placeholder="<?= $field->area->full_name ?>" readonly>
            </div>
            <div class="oldPwd">
                <span>详细地址:</span>
                <input type="text" placeholder="<?= $field->address ?>" readonly>
            </div>
            <!--场地介绍-->
            <div class="field_info">
                <p class="fieldTit">场地介绍:</p>
                <textarea
                        style="height: 20rem;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);"
                        readonly><?= $field->intro ?></textarea>
            </div>
            <!--场地图片-->
            <div class="field_info">
                <p class="fieldTit">场地图片:</p>
                <p class="field_imgs">
                    <?php foreach (explode(',', $field->image) as $k => $v): ?>
                        <img src="<?= $v ?>" alt="场地图片<?= $k + 1 ?>">
                    <?php endforeach; ?>
                </p>
            </div>
            <?php if (in_array($field->status, [1, 6])): ?>
                <div class="field_info configure_photo">
                    <p class="fieldTit">配置单图片:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.configure_photo',
                                name: 'configure_photo',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$field->configure_photo?>`
                            });
                        </script>
                    </p>
                </div>
                <div class="field_info prove_photo">
                    <p class="fieldTit">场地证明图片:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.prove_photo',
                                name: 'prove_photo',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$field->prove_photo?>`
                            });
                        </script>
                    </p>
                </div>
                <div class="field_info field_photo">
                    <p class="fieldTit">场地合同图片:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.field_photo',
                                name: 'field_photo',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$field->field_photo?>`
                            });
                        </script>
                    </p>
                </div>
                <div class="oldPwd">
                    <span>分成比例:</span>
                    <input type="text" name="field_ratio" value="<?= $field->field_ratio ?>">
                </div>
            <?php endif; ?>
            <?php if (in_array($field->status, [4, 5]) || $field->status >= 8): ?>
                <div class="field_info">
                    <p class="fieldTit">配置单图片:</p>
                    <?php foreach (explode(',', $field->configure_photo) as $k => $v): ?>
                        <p class="field_imgs">
                            <img src="<?= $v ?>" alt="配置单图片<?= $k + 1 ?>">
                        </p>
                    <?php endforeach; ?>
                </div>
                <div class="field_info">
                    <p class="fieldTit">场地证明图片:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->prove_photo) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="场地证明图片<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="field_info">
                    <p class="fieldTit">场地合同图片:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->field_photo) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="场地合同图片<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="oldPwd">
                    <span>分成比例:</span>
                    <input type="text" value="<?= $field->field_ratio ?>" readonly>
                </div>
            <?php endif; ?>
            <?php if ($field->status == 11 || $field->status >= 14): ?>
                <div class="oldPwd">
                    <span style="width: 100%">备案文件:<a href="<?= $field->record_file ?>">点击下载</a></span>
                </div>
                <div class="field_info">
                    <p class="fieldTit">变压器图纸:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->transformer_drawing) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="变压器图纸<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="field_info">
                    <p class="fieldTit">施工图纸:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->field_drawing) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="施工图纸<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="field_info">
                    <p class="fieldTit">预算报表:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->budget_photo) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="预算报表<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
                <div class="oldPwd">
                    <span>场地面积:</span>
                    <input type="text" placeholder="<?= $field->areas ?>" readonly>
                </div>
                <div class="oldPwd">
                    <span>预算总金额:</span>
                    <input type="text" placeholder="<?= $field->budget ?>" readonly>
                </div>
            <?php endif; ?>
            <?php if (in_array($field->status, [11, 16])): ?>
                <div class="field_info power_photo">
                    <p class="fieldTit">电力证明:
                        <button type="button" class="add">添加图片</button>
                    </p>
                    <p class="field_imgs">
                        <script>
                            h5Upload({
                                max: 4,
                                element: '.power_photo',
                                name: 'power_photo',
                                click: '.add',
                                box: '.field_imgs',
                                default: `<?=$field->power_photo?>`
                            });
                        </script>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (in_array($field->status, [14, 15])): ?>
                <div class="field_info">
                    <p class="fieldTit">电力证明:</p>
                    <p class="field_imgs">
                        <?php foreach (explode(',', $field->power_photo) as $k => $v): ?>
                            <img src="<?= $v ?>" alt="电力证明<?= $k + 1 ?>">
                        <?php endforeach; ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if (in_array($field->status, [6, 16])): ?>
                <div class="oldPwd">
                    <span>驳回说明:</span>
                    <textarea
                            style="height: 20rem;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);"
                            readonly><?= $field->remark ?></textarea>
                </div>
            <?php endif; ?>
            <?php if (in_array($field->status, [1, 6, 11, 15, 16])): ?>
                <?php if ($field->status != 15): ?>
                <button type="submit" style="font-size: 2rem;background-color: #3072f6;border-radius: 5px;width: 18%;height: 5rem;color: white;margin-top: 1rem">确认提交</button>
            <?php endif; ?>
            <?php if ($field->status != 16): ?>
                <button type="button" class="del" style="font-size: 2rem;background-color: #FF4136;border-radius: 5px;width: 18%;height: 5rem;color: white;margin-top: 1rem">放弃
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
                    </div>`
                </div>
                <script>
                    $(function () {
                        $('.del').click(function () {
                            $('.intent').fadeIn();
                        });
                        $('.close').click(function () {
                            console.log(111);
                            $('.intent').fadeOut();
                        });
                        $('.up').click(function () {
                            if ($('.explain').val()) {
                                $.getJSON('/user/field/del.html', {
                                    no: '<?=$field->no?>',
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
