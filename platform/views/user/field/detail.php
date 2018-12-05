<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>user</title>
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
    <script src="/resources/js/area.js" type="text/javascript" charset="utf-8"></script>
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
            <li class="actives"><a href="/user/field/track-field.html">场地跟踪</a></li>
            <li><a href="/user/user/update.html">修改密码</a></li>
            <li><a href="/user/ident/ident.html">认证合伙人</a></li>
        </ul>
    </div>

    <!--右边内容-->
    <div class="user_contRt float_right">
        <!--盒子里面的内容2-->
        <div class="inner_Cont">
            <div class="userTit">
                场地编号:<?= $field->no ?>&emsp;<?= \vendor\helpers\Constant::getFieldStatus()[$field->status] ?>
            </div>
            <form action="/user/field/update.html?no=<?= $field->no ?>" method="post">
                <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <ul class="change_pwd">
                    <li>
                        <span>场地标题：</span>
                        <input type="text" placeholder="<?= $field->title ?>" readonly>
                    </li>
                    <li>
                        <span>场地地域 :</span>
                        <input type="text" placeholder="<?= $field->area->full_name ?>" readonly>
                    </li>
                    <li>
                        <span>详细地址：</span>
                        <input type="text" placeholder="<?= $field->address ?>" readonly>
                    </li>
                    <li>
                        <span>场地介绍：</span>
                        <div style="height: 100px;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);">
                            <?= $field->intro ?>
                        </div>
                    </li>
                    <li>
                        <span>场地图片：</span>
                        <div class="image"></div>
                        <script>
                            picWall({
                                element: '.image',
                                image: '<?=$field->image?>'
                            });
                        </script>
                    </li>
                    <?php if (in_array($field->status, [1, 6])): ?>
                        <li>
                            <span>配置单：</span>
                            <div class="configure_photo"></div>
                            <script>
                                upload({
                                    element: '.configure_photo',
                                    name: 'configure_photo',
                                    max: 4,
                                    height: 10,
                                    default: '<?=$field->configure_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>场地证明图片：</span>
                            <div class="prove_photo"></div>
                            <script>
                                upload({
                                    element: '.prove_photo',
                                    name: 'prove_photo',
                                    max: 4,
                                    height: 10,
                                    default: '<?=$field->prove_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>场地合同图片：</span>
                            <div class="field_photo"></div>
                            <script>
                                upload({
                                    element: '.field_photo',
                                    name: 'field_photo',
                                    max: 4,
                                    height: 10,
                                    default: '<?=$field->field_photo?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [4, 5]) || $field->status >= 8): ?>
                        <li>
                            <span>配置单：</span>
                            <div class="configure_photo"></div>
                            <script>
                                picWall({
                                    element: '.configure_photo',
                                    image: '<?=$field->configure_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>场地证明图片：</span>
                            <div class="prove_photo"></div>
                            <script>
                                picWall({
                                    element: '.prove_photo',
                                    image: '<?=$field->prove_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>场地合同图片：</span>
                            <div class="field_photo"></div>
                            <script>
                                picWall({
                                    element: '.field_photo',
                                    image: '<?=$field->field_photo?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if ($field->status == 11 || $field->status >= 14): ?>
                        <li>
                            <span>备案文件：</span>
                            <a href="<?= $field->record_file ?>" style="float: none;margin-left: 0">点击下载</a>
                        </li>
                        <li>
                            <span>变压器图纸：</span>
                            <div class="transformer_drawing"></div>
                            <script>
                                picWall({
                                    element: '.transformer_drawing',
                                    image: '<?=$field->transformer_drawing?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>施工图纸：</span>
                            <div class="field_drawing"></div>
                            <script>
                                picWall({
                                    element: '.field_drawing',
                                    image: '<?=$field->field_drawing?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>预算报表：</span>
                            <div class="budget_photo"></div>
                            <script>
                                picWall({
                                    element: '.budget_photo',
                                    image: '<?=$field->budget_photo?>'
                                });
                            </script>
                        </li>
                        <li>
                            <span>场地面积：</span>
                            <input type="text" placeholder="<?= $field->areas ?>" readonly>
                        </li>
                        <li>
                            <span>预算总金额：</span>
                            <input type="text" placeholder="<?= $field->budget ?>" readonly>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [11, 16])): ?>
                        <li>
                            <span>电力证明：</span>
                            <div class="transformer_drawing"></div>
                            <script>
                                upload({
                                    element: '.transformer_drawing',
                                    name: 'transformer_drawing',
                                    max: 4,
                                    height: 10,
                                    default: '<?=$field->transformer_drawing?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [14, 15])): ?>
                        <li>
                            <span>电力证明：</span>
                            <div class="transformer_drawing"></div>
                            <script>
                                picWall({
                                    element: '.power_photo',
                                    image: '<?=$field->power_photo?>'
                                });
                            </script>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [6, 16])): ?>
                        <li>
                            <span>驳回说明：</span>
                            <div style="height: 100px;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);">
                                <?= $field->remark ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [1, 6, 11, 16])): ?>
                        <li>
                            <span></span>
                            <button type="submit">确认提交</button>
                        </li>
                    <?php endif; ?>
                    <?php if (in_array($field->status, [3, 7, 13, 17])): ?>
                        <li>
                            <span></span>
                            <button type="button">放弃</button>
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
        <p>Copyright © 2018 en.link，All Rights Reserved. 四川亿能天成科技有限公司</p>
    </div>
</div>
<!--脚部end-->
</body>
</html>
