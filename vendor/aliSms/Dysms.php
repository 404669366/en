<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/5/14
 * Time: 13:14
 */

namespace vendor\aliSms;


class Dysms
{
    private static $accessKeyId = 'LTAIX4UyfdIq5jZT';
    private static $accessKeySecret = 'KFxxbKAl6HnUhJZu3Itrks1p2nxY85';

    /**
     * 发送单条短信
     * @param string $tel
     * @param array $tpl
     * @param string $templateCode
     * @param string $signName
     * @return bool|\stdClass
     */
    public static function sendSms($tel = '', $tpl = [], $templateCode = 'SMS_127835100', $signName = '聚马飞腾')
    {
        $params["PhoneNumbers"] = $tel;
        $params["SignName"] = $signName;
        $params["TemplateCode"] = $templateCode;
        $params['TemplateParam'] = json_encode($tpl, JSON_UNESCAPED_UNICODE);
        $helper = new SignatureHelper();
        $content = $helper->request(
            self::$accessKeyId,
            self::$accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, [
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",])
        );
        return $content;
    }
}