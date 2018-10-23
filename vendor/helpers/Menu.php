<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/17
 * Time: 17:22
 */

namespace vendor\helpers;


class Menu
{
    /**
     * 记录当前菜单
     * @param string $name
     */
    public static function setNow($name = '')
    {
        if ($name) {
            \Yii::$app->session->set('ReceptionMenuNow', $name);
        }
    }
}