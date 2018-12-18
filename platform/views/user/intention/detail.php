<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>意向管理详情</title>
    <!--引入重置样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/reset.css"/>
    <!--引入公共样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/common.css"/>
    <!--引入user样式-->
    <link rel="stylesheet" type="text/css" href="/resources/css/user.css"/>
    <!--引入字体-->
    <link rel="stylesheet" type="text/css" href="/resources/css/font-awesome.min.css"/>
    <script src="/resources/js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/resources/js/layer/layer.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/upload/upload.js" type="text/javascript" charset="utf-8"></script>
    <script src="/sinlar/sinlar.js" type="text/javascript" charset="utf-8"></script>


</head>
<body>
<?php \vendor\helpers\Msg::run('PopupMsg') ?>
<!--header-->
<div class="header">
    <div class="nav box1200">
        <img src="/resources/images/LG.png"/>
        <ul class="nva_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $v): ?>
                <a href="<?= $v['url'] ?>">
                    <li><?= $v['name'] ?></li>
                </a>
            <?php endforeach; ?>
        </ul>
        <div class="esc">
            <?= $basisData['user']['tel'] ?> |
            <a href="/login/login/logout.html">退出</a>
        </div>
        <!--清除浮动-->
        <div class="clear"></div>
    </div>
</div>
<!--header end-->

<!--content-->
<div class="user_cont">
    <!--左边内容-->
    <div class="user_contLt float_left">
        <img src="/resources/images/user.png"/>
        <p class="welcome">欢迎你，<?= $basisData['user']['tel'] ?></p>
        <ul>
            <li><a href="/user/user/user.html">关注场地</a></li>
            <li><a href="/user/user/basis-field.html">基础场地</a></li>
            <li><a href="/user/intention/list.html">我的意向</a></li>
            <li><a href="/user/release/release.html">发布真实场地</a></li>
            <li><a href="/user/field/track-field.html">场地跟踪</a></li>
            <li class="actives"><a href="/user/intention/manage.html">意向管理</a></li>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li><a href="/user/ident/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容1-->
        <div class="inner_Cont">
            <div class="userTit">
                意向:<?= $data->no ?>
            </div>
            <form action="" method="post">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <ul class="change_pwd">
                    <li>
                        <span>意向编号：</span>
                        <input type="text" placeholder="<?= $data->no ?>" readonly>
                    </li>
                    <li>
                        <span>场地编号：</span>
                        <input type="text" placeholder="<?= $data->field->no ?>" readonly>
                    </li>
                    <?php if (in_array($data->status, [2, 3])): ?>
                        <li>
                            <span>预购金额：</span>
                            <input type="text" placeholder="<?= $data->money ?>" readonly>
                        </li>
                        <li>
                            <span>分成比例：</span>
                            <input type="text" placeholder="<?= $data->ratio ?>" readonly>
                        </li>
                        <li>
                            <span>投资人合同：</span>
                            <div class="contract_photo"></div>
                            <script>
                                picWall({
                                    element: '.contract_photo',
                                    image: '<?=$data->contract_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>打款凭证：</span>
                            <div class="money_audit"></div>
                            <script>
                                picWall({
                                    element: '.money_audit',
                                    image: '<?=$data->money_audit?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($data->status, [0, 4])): ?>
                        <li>
                            <span>预购金额：</span>
                            <input type="text" name="money" validate="notNull" maxlength="20"
                                   value="<?= $data->money ?>">
                        </li>
                        <li>
                            <span>分成比例：</span>
                            <input type="text" name="ratio" validate="notNull" maxlength="20"
                                   value="<?= $data->ratio ?>">
                        </li>
                        <li>
                            <span>投资人合同：</span>
                            <div class="contract_photo"></div>
                            <script>
                                upload({
                                    element: '.contract_photo',
                                    name: 'contract_photo',
                                    height: 10,
                                    default: '<?=$data->contract_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>打款凭证：</span>
                            <div class="money_audit"></div>
                            <script>
                                upload({
                                    element: '.money_audit',
                                    name: 'money_audit',
                                    height: 10,
                                    default: '<?=$data->money_audit?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if ($data->status == 4): ?>
                        <li>
                            <span>驳回说明：</span>
                            <div style="height: 100px;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);"><?= $data->remark ?></div>
                        </li>
                    <?php endif; ?>
                    <li>
                        <span>意向状态：</span>
                        <input type="text"
                               placeholder="<?= \vendor\helpers\Constant::getIntentionStatus()[$data->status] ?>"
                               readonly>
                    </li>
                    <?php if (in_array($data->status, [0, 4])): ?>
                        <li>
                            <span></span>
                            <button type="submit">确认提交</button>
                            <?php if ($data->status == 0): ?>
                                <button type="button" class="del" style="margin-left: 20px;background-color: red">放弃
                                </button>
                                <div class="intent"
                                     style="display: none;width: 100%;height: 100%;position: fixed;z-index: 999;background: rgba(0, 0, 0, 0.7);;top: 0;left: 0">
                                    <div style="width: 340px;height: 235px;background: #fcfcfc;margin: 300px auto;border-radius: 3px;position: relative">
                                        <div class="close"
                                             style="position: absolute;right: 15px;top: 15px;height: 20px;line-height: 20px;width: 20px;text-align: center;font-size: 16px;cursor: pointer">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </div>
                                        <div style="width: 310px;height: 200px;position: absolute;top: 35px;padding: 0 15px">
                                            <span style="width: 310px;text-align: center;height: 30px;line-height: 30px;font-size: 24px;display: inline-block">放弃说明</span>
                                            <textarea class="explain"
                                                      style="width: 200px;height: 95px;line-height: 30px;font-size: 16px;display: block;margin: 10px auto 0 auto;"
                                                      placeholder="请填写放弃说明"></textarea>
                                            <span style="width: 310px;text-align: center;height: 30px;font-size: 16px;display: inline-block;margin-top: 10px;">
                <button class="up" type="button"
                        style="border: none;border-radius:3px;color: white;background-color: #3072F6;width: 120px;display: inline-block;height: 30px;line-height: 30px;float: none">确认</button>
            </span>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    $('.del').click(function () {
                                        $('.intent').fadeIn();
                                    });
                                    $('.intent .close').click(function () {
                                        $('.intent').fadeOut();
                                    });
                                    $('.up').click(function () {
                                        if ($('.explain').val()) {
                                            $.getJSON('/user/intention/del.html', {
                                                no: '<?=$data->no?>',
                                                explain: $('.explain').val()
                                            }, function (re) {
                                                if (re.type) {
                                                    layer.msg('提交成功');
                                                    window.location.href = '/user/intention/manage.html';
                                                } else {
                                                    layer.msg(re.msg);
                                                }
                                                $('.intent').fadeOut();
                                            })
                                        } else {
                                            layer.msg('请填写放弃说明');
                                        }
                                    });
                                </script>
                            <?php endif; ?>
                        </li>

                    <?php endif; ?>
                </ul>
            </form>
        </div>
    </div>
    <!--清除浮动-->
    <div class="clear"></div>
</div>
<!--content end-->

<!--脚部start-->
<div class="footer marginTop80">
    <div class="box1200">
        <!--合作商-->
        <ul class="footer_nav">
            <?php foreach ($basisData['friends'] as $v): ?>
                <li><a rel="nofollow" target="_blank" href="<?= $v['url'] ?>"><img
                                src="<?= $v['image'] ?>"/></a></li>
            <?php endforeach; ?>
        </ul>
        <!--关于我们-->
        <ul class="footer_list">
            <?php foreach (\vendor\en\Menu::getMenu() as $k => $v): ?>
                <li>
                    <a href="<?= $v['url'] ?>"><?= $v['name'] ?></a><?= count(\vendor\en\Menu::getMenu()) == $k + 1 ? '' : '&nbsp; |&nbsp;' ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <!--公众号-->
        <ul class="public">
            <li><img src="/resources/images/en2.png"/></li>
            <li><img src="/resources/images/en2.png"/></li>
        </ul>
        <!--底部版权-->
        <p>Copyright © 2018 en.ink，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
