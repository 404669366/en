<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/15
 * Time: 14:41
 */

namespace vendor\helpers;


class Msg
{
    /**
     * 设置消息
     * @param string $msg
     * @return bool
     */
    public static function set($msg = '')
    {
        if ($msg) {
            \Yii::$app->session->set('BackstageMsg', $msg);
            return true;
        }
        return false;
    }

    /**
     * 渲染消息
     * @param string $key
     */
    public static function run($key = 'BackstageMsg')
    {
        if ($msg = \Yii::$app->session->get($key, false)) {
            \Yii::$app->session->set($key, null);
            echo "<script>layer.msg('$msg');</script>";
        }
    }
}