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

    /**
     * 设置当前菜单
     * @param string $default
     */
    public static function nowMenuRun($default = '首页')
    {
        $now = \Yii::$app->session->get('ReceptionMenuNow', $default);
        echo <<<HTML
            <script>
                $('.nav').find('a').removeClass('active').each(function(k,v){
                    if($(v).text()==='{$now}'){
                        $(v).addClass('active')
                    }
                })
            </script>
HTML;
    }
}