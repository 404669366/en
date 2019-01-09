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
            <div class="oldPwd">
                <span>场地类型:</span>
                <input type="text" placeholder="<?= \vendor\helpers\Constant::getFieldType()[$field->type] ?>"
                       readonly>
            </div>
            <div class="oldPwd">
                <span>场地标题:</span>
                <input type="text" placeholder="<?= $field->title ?>" readonly>
            </div>
            <div class="oldPwd area">
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
                <div>
                    <textarea style="height: 12rem;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);"  readonly><?= $field->intro ?></textarea>
                </div>
            </div>
            <!--场地图片-->
        <div class="field_info">
            <p class="fieldTit image">场地图片:</p>
            <div style="height: 12rem;width: 100%;margin-top: 4px;text-indent: 24px;border: 1px dashed rgb(17, 17, 17);">
            </div>
            <script>
                picWall({
                    element: '.image',
                    image: '<?=$field->image?>'
                });
            </script>
        </div>

    </div>
</div>
<!--certified_Partners end-->
</body>
</html>
