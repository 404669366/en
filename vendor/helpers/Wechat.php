<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2019/2/13
 * Time: 9:39
 */

namespace vendor\helpers;


use vendor\en\User;

class Wechat
{
    const APP_ID = 'wxf7613d39c63057cd';
    const SECRET = '26efc892fbe387d62dd131f6eedc5fd1';
    private static $app;
    private $appId = 'wxf7613d39c63057cd';
    private $appSecret = '26efc892fbe387d62dd131f6eedc5fd1';
    private $mchId = '1508633591';
    private $payKey = 'ceh5oxr2z7xlx20ixnxab0vkauiyt2n8';
    private $urls = [
        'token' => ['url' => 'https://api.weixin.qq.com/cgi-bin/token', 'needToken' => false],
        'ticket' => ['url' => 'https://api.weixin.qq.com/cgi-bin/ticket/getticket', 'needToken' => true],
        'code' => ['url' => 'https://open.weixin.qq.com/connect/oauth2/authorize', 'needToken' => false],
        'open' => ['url' => 'https://api.weixin.qq.com/sns/oauth2/access_token', 'needToken' => false],
        'user' => ['url' => 'https://api.weixin.qq.com/cgi-bin/user/info', 'needToken' => true],
    ];

    /**
     * 单例入口
     * @return Wechat
     */
    public static function
    app()
    {
        if (!self::$app) {
            self::$app = new self();
        }
        return self::$app;
    }


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
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential';
        $url .= '&appid=' . self::APP_ID;
        $url .= '&secret=' . self::SECRET;
        $re = file_get_contents($url);
        $re = json_decode($re, true);
        if (isset($re['access_token'])) {
            redis::app()->set('UnifiedAccessToken', $re['access_token'], $re['expires_in'] - 200);
            return $re['access_token'];
        }
        return false;
    }

    /**
     * 获取用户授权code链接
     * @param string $redirect
     * @return string
     */
    public static function getUserAuthorizeCodeUrl($redirect = 'http://m.en.ink/login/login/login-w.html')
    {
        $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?';
        $url .= 'appid=' . self::APP_ID;
        $url .= '&redirect_uri=' . urlencode($redirect);
        $url .= '&response_type=code&scope=snsapi_userinfo#wechat_redirect';
        return $url;
    }

    /**
     * 获取用户授权access_token
     * @param string $code 用户授权code
     * @return bool|mixed|string
     */
    public static function getUserAuthorizeAccessToken($code = '')
    {
        $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?';
        $url .= 'appid=' . self::APP_ID;
        $url .= '&secret=' . self::SECRET;
        $url .= '&code=' . $code;
        $url .= '&grant_type=authorization_code';
        $re = file_get_contents($url);
        $re = json_decode($re, true);
        if (isset($re['errcode'])) {
            return false;
        }
        return $re;
    }

    /**
     * 生成预订单
     * @param string $no
     * @param int $money
     * @param int $userId
     * @param string $backUrl
     * @return array|bool
     */
    public  function getPayData($no = '', $money = 0, $userId = 0, $backUrl = '/order/wx/back')
    {

        $data = [
            'appid' => $this->appId,
            'attach' => json_encode(['no' => $no]),
            'out_trade_no' => $no,
            'device_info' => 'WEB',
            'total_fee' => $money * 100,
            'body' => '四川亿能天成科技有限公司-余额充值',
            'mch_id' => $this->mchId,
            'nonce_str' => $this->getNonceStr(),
            'notify_url' => \Yii::$app->request->hostInfo . $backUrl,
            'openid' => User::findOne($userId)->wechat,
            'trade_type' => 'JSAPI',
            'spbill_create_ip' => Helper::getIp(),
        ];
        $data['sign'] = $this->makeSign($data);
        $data = $this->curlPostXml('https://api.mch.weixin.qq.com/pay/unifiedorder', $this->toXml($data), '10');
        if ($data && isset($data['return_code']) && $data['return_code'] == 'SUCCESS') {
            $data = [
                'appId' => $data['appid'],
                'timeStamp' => time(),
                'nonceStr' => $this->getNonceStr(),
                'package' => "prepay_id={$data['prepay_id']}",
                'signType' => 'MD5',
            ];
            $data['paySign'] = $this->makeSign($data);
            $data['timestamp'] = $data['timeStamp'];
            unset($data['timeStamp']);
            return $data;
        }
        return [];
    }

    /**
     * 生成签名的随机字符串
     * @return string
     */
    private function getNonceStr()
    {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str = "";
        for ($i = 0; $i < 16; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }


    /**
     * 参数格式化成url参数
     * @param $arr
     * @return string
     */
    private function toUrlParams($arr)
    {
        $buff = "";

        foreach ($arr as $k => $v) {
            if ($k != "sign" && $v != "" && !is_array($v)) {
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * 生成sign
     * @param $arr
     * @return string
     */
    private function makeSign($arr)
    {
        //签名步骤一：按字典序排序参数
        ksort($arr);
        $string = $this->toUrlParams($arr);

        //签名步骤二：在string后加入KEY
        $string = $string . "&key=" . $this->payKey;

        //签名步骤三：MD5加密
        $string = md5($string);

        //签名步骤四：所有字符转为大写
        $result = strtoupper($string);

        return $result;
    }

    /**
     * curl发送xml(post)
     * @param string $url
     * @param string $xml
     * @param int $second
     * @return array|bool
     */
    private function curlPostXml($url = '', $xml = '', $second = 30)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, $second);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        $data = curl_exec($ch);
        return (array)simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
    }

    /**
     * 输出xml字符
     * @param $arr
     * @return string
     */
    private function toXml($arr)
    {
        $xml = "<xml>";
        foreach ($arr as $key => $val) {
            if (is_numeric($val)) {
                $xml .= "<" . $key . ">" . $val . "</" . $key . ">";
            } else {
                $xml .= "<" . $key . "><![CDATA[" . $val . "]]></" . $key . ">";
            }
        }
        $xml .= "</xml>";
        return $xml;
    }

    /**
     * 获取ticket
     * @return array|mixed
     */
    public function getTicket()
    {
        $ticket = \Yii::$app->cache->get('WEIXINTICKET') ? \Yii::$app->cache->get('WEIXINTICKET') : '';
        if (!$ticket) {
            $re = $this->curlGet('ticket', ['type' => 'jsapi']);
            if (isset($re['ticket'])) {
                $ticket = $re['ticket'];
                \Yii::$app->cache->set('WEIXINTICKET', $ticket, 3600);
            }
        }
        return $ticket;
    }

    /**
     * 获取JsApi参数
     * @param int $time
     * @param string $nonceStr
     * @return array
     */
    public function getJsApiInfoByScan($time = 0, $nonceStr = '')
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $nonceStr = $nonceStr ? $nonceStr : $this->getNonceStr();
        $time = $time ? $time : time();
        $signature = sha1("jsapi_ticket={$this->getTicket()}&noncestr={$nonceStr}&timestamp={$time}&url={$url}");
        return [
            'appId' => $this->appId,
            'nonceStr' => $nonceStr,
            'time' => $time,
            'signature' => $signature
        ];
    }

    /**
     * 获取token
     * @return mixed|string
     */
    public function getToken()
    {
        $token = \Yii::$app->cache->get('WEIXINTOKEN') ? \Yii::$app->cache->get('WEIXINTOKEN') : '';
        if (!$token) {
            $re = $this->curlGet('token', [
                'grant_type' => 'client_credential',
                'appid' => $this->appId,
                'secret' => $this->appSecret
            ]);
            if (isset($re['access_token'])) {
                $token = $re['access_token'];
            }
            \Yii::$app->cache->set('WEIXINTOKEN', $token, 3600);
        }
        return $token;
    }

    /**
     * 请求数据(GET)
     * @param string $do
     * @param array $params
     * @param string $last
     * @return array|mixed
     */
    private function curlGet($do = '', $params = [], $last = '')
    {
        if (!isset($this->urls[$do])) {
            return [];
        }
        $role = $this->urls[$do];
        $url = $params ? $role['url'] . '?' : $role['url'];
        foreach ($params as $k => $v) {
            $url .= $k . '=' . $v . '&';
        }
        $url = rtrim($url, '&') . $last;
        if ($role['needToken']) {
            $url .= '&access_token=' . $this->getToken();
        }
        $data = file_get_contents($url);
        return json_decode($data, true);
    }
}