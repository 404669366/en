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

    /**
     * 获取默认数据
     * @param $area_id
     * @return string
     */
    public function actionDef($area_id)
    {
        return $this->rJson(Area::getDefault($area_id));
    }

    /**
     * 获取坐标
     * @param $area_id
     * @return string
     */
    public function actionCoordinate($area_id)
    {
        $model = Area::findOne(['area_id' => $area_id]);
        return $this->rJson(['lng' => $model->lng, 'lat' => $model->lat]);
    }
}