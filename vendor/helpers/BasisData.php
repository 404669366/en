<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/11/18
 * Time: 16:55
 */

namespace vendor\helpers;


use vendor\en\Friends;
use vendor\en\User;

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
            'isCobber' => User::isCobber(),
            'user' => \Yii::$app->user->getIdentity(),
            'friends' => Friends::getFriends()
        ];
    }
}