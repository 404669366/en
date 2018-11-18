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

class BasisController extends Controller
{
    /**
     * 重写render，返回基础数据
     * @param string $view
     * @param array $params
     * @return string
     */
    public function render($view, $params = [])
    {
        $params['basisData'] = BasisData::getBasisData();
        return parent::render($view, $params);
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