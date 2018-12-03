<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/28
 * Time: 13:21
 */

namespace app\controllers\basis;


use vendor\en\Area;

class AreaController extends CommonController
{
    /**
     * 返回地域数据
     * @param int $pid
     * @return string
     */
    public function actionData($pid = 0)
    {
        return $this->rJson(Area::getData($pid));
    }
}