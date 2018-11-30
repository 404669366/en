<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 10:16
 */

namespace app\controllers\basis;


use vendor\helpers\BasisData;
use yii\web\Controller;
use yii\web\Cookie;

class BasisController extends Controller
{
    /**
     * 重写render，返回基础数据
     * @param string $view
     * @param array $params
     * @param string $msg
     * @return string
     */
    public function render($view, $params = [], $msg = '')
    {
        if ($msg) {
            \Yii::$app->session->set('PopupMsg', $msg);
        }
        $params['basisData'] = BasisData::getBasisData();
        return parent::render($view, $params);
    }

    /**
     * 重写redirect，返回弹窗信息
     * @param array|string $url
     * @param string $msg
     * @param int $statusCode
     * @return \yii\web\Response
     */
    public function redirect($url, $msg = '', $statusCode = 302)
    {
        if ($msg) {
            \Yii::$app->session->set('PopupMsg', $msg);
        }
        return parent::redirect($url, $statusCode);
    }

    /**
     * 返回json数据
     * @param array $data
     * @param bool $type
     * @param string $msg
     * @return string
     */
    public function rJson($data = [], $type = true, $msg = 'ok')
    {
        echo json_encode(['type' => $type, 'msg' => $msg, 'data' => $data], JSON_UNESCAPED_UNICODE);
        exit();
    }

    /**
     * 返回分页数据
     * @param array $data
     * @return string
     */
    public function rPageJson($data = [])
    {
        echo json_encode(['total' => $data['total'], 'data' => $data['data']], JSON_UNESCAPED_UNICODE);
        exit();
    }
}