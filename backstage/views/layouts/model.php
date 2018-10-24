<?php
\app\assets\ModelAsset::register($this);
\app\assets\ModelAsset::offDeBug();
$this->beginPage();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>亿能科技</title>
    <?php $this->head(); ?>
</head>
<body class="gray-bg">
<?php $this->beginBody(); ?>
<?php $this->endBody(); ?>
<script>
    $('body').find('.back').attr('type','button');
    $('body').on('click','.back',function () {
        history.go(-1);
    });
</script>
<?php \vendor\helpers\Msg::run() ?>
<div class="wrapper wrapper-content animated fadeIn">
    <?= $content ?>
</div>
</body>
</html>
<?php $this->endPage() ?>

