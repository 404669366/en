<?php

/**
 * Created by PhpStorm.
 * User: d
 * Date: 2018/3/29
 * Time: 9:56
 */

namespace vendor\helpers;

use vendor\aliSms\Dysms;

class Sms
{

    /**
     * 发送短信验证码
     * @param $tel
     * @param string $templateCode
     * @return int
     */
    public static function sendCode($tel, $templateCode = 'SMS_127835100')
    {
        $code = mt_rand(1000, 9999);
        Dysms::sendSms($tel, ['code' => $code], $templateCode);
        \Yii::$app->cache->set('Code_' . $tel, $code, 60 * 60 * 2);
        return $code;
    }

    /**
     * 验证短信验证码
     * @param $tel
     * @param $code
     * @return bool
     * QAQ宇酱
     */
    public static function validateCode($tel, $code)
    {
        $old = \Yii::$app->cache->get('Code_' . $tel);
        if ($old && $code) {
            if ($old == $code) {
                \Yii::$app->cache->set('Code_' . $tel, '');
                return true;
            }
        }
        return false;
    }
}