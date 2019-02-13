<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2019/2/13
 * Time: 9:39
 */

namespace vendor\helpers;


class Wechat
{
    const APP_ID = '';
    const SECRET = '';

    /**
     * 判断是否微信访问
     * @return bool
     */
    public static function isWechat()
    {
        if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
            return true;
        }
        return false;
    }

    /**
     * 获取统一接口调用access_token
     * @return bool|string
     */
    public static function getUnifiedAccessToken()
    {
        if ($access_token = redis::app()->get('UnifiedAccessToken')) {
            return $access_token;
        }
        $re = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . self::APP_ID . '&secret=' . self::SECRET);
        if (isset($re['access_token'])) {
            redis::app()->set('UnifiedAccessToken', $re['access_token'], $re['expires_in'] - 200);
            return $re['access_token'];
        }
        return false;
    }
}