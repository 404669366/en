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
    <title>H+ 后台主题UI框架</title>
    <?php $this->head(); ?>
</head>
<body class="gray-bg">
<?php $this->beginBody(); ?>
<?php $this->endBody(); ?>
<?= $content ?>
</body>
</html>
<?php $this->endPage() ?>

