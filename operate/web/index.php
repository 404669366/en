<?php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_GII') or define('YII_GII', false);

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
$config = require __DIR__ . '/../config/web.php';
(new yii\web\Application(require __DIR__ . '/../config/web.php'))->run();

