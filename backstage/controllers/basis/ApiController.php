<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/17
 * Time: 15:13
 */

namespace app\controllers\basis;


use yii\web\Controller;

class ApiController extends Controller
{
    /**
     * 返回json数据
     * @param array $data
     * @param bool $type
     * @param string $msg
     */
    public function rJson($data = [], $type = true, $msg = 'ok')
    {
        echo json_encode(['type' => $type, 'msg' => $msg, 'data' => $data], JSON_UNESCAPED_UNICODE);
        exit();
    }
}