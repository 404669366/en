<?php
/**
 * Created by PhpStorm.
 * User: zhangjiajing
 * Date: 2017/6/12
 * Time: 15:55
 */

namespace app\assets;

use yii\web\AssetBundle;
class ModelAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/resource/css/bootstrap.min.css',
        '/resource/style.css',
        '/resource/css/colors.css',
        '/resource/css/versions.css',
        '/resource/css/responsive.css',
        '/resource/css/custom.css',
    ];
    public $js = [
        '/resource/js/jquery.min.js',
        '/resource/js/layer/layer.min.js',
    ];
}
