<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/5/22
 * Time: 18:00
 */

namespace app\controllers\order;


use vendor\en\Recharge;
use yii\web\Controller;

class WxController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * 返回xml数据
     * @param array $data
     * @return string
     */
    public function rXml($data = [])
    {
        $xml = '<xml>';
        foreach ($data as $k => $v) {
            $xml .= '<' . $k . '><![CDATA[' . $v . ']]></' . $k . '>';
        }
        $xml .= '</xml>';

        echo $xml;
        exit();
    }

    /**
     * 接收xml数据
     * @param string $key
     * @param string $default
     * @return array|mixed|string
     */
    public function getXml($key = '', $default = '')
    {
        $file_in = file_get_contents("php://input"); //接收post数据
        $xml = (array)simplexml_load_string($file_in, 'SimpleXMLElement', LIBXML_NOCDATA);
        if ($key) {
            if (isset($xml[$key])) {
                return $xml[$key];
            } else {
                return $default;
            }
        }
        return $xml;
    }

    /**
     * 微信充值回调
     * @return string
     */
    public function actionBack()
    {
        $data = $this->getXml();
        if (isset($data['return_code']) && $data['return_code'] == 'SUCCESS') {
            $model = Recharge::findOne(['no' => $data['out_trade_no'], 'status' => 0]);
            if ($model) {
                $model->status = 1;
                if ($model->save() && \vendor\en\User::addMoney($model->user_id, $model->money)) {
                    return $this->rXml(['return_code' => 'SUCCESS', 'return_msg' => 'OK']);
                }
                $model->status = 2;
                $model->save();
            }
        }
        return $this->rXml(['return_code' => 'FAIL', 'return_msg' => '充值失败']);
    }
}