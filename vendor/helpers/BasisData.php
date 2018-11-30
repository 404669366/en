<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/11/18
 * Time: 16:55
 */

namespace vendor\helpers;


class BasisData
{
    /**
     * 返回基础数据
     * @return array
     */
    public static function getBasisData()
    {
        return [
            'isGuest' => \Yii::$app->user->isGuest,
            'user' => \Yii::$app->user->getIdentity()
        ];
    }
}