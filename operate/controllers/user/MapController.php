<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/30
 * Time: 16:07
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Area;
use vendor\en\Electricize;
use vendor\en\Field;
use vendor\en\SectionRule;
use vendor\helpers\Helper;
use vendor\helpers\redis;

class MapController extends CommonController
{
    public function actionMap()
    {
        return $this->render('map');
    }

    /**
     * 场地列表页
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 场地列表数据
     * @param string $city
     * @param int $lng
     * @param int $lat
     * @param int $parking_fee
     * @param int $type
     * @param int $standard
     * @return string
     */
    public function actionData($city = '', $lng = 0, $lat = 0, $parking_fee = 0, $type = 0, $standard = 0)
    {
        $provinces = Area::getData();
        $city = Area::findOne(['area_name' => $city, 'level' => [2, 3]]);
        if ($city) {
            $citys = Area::getData($city->province_id);
            $province = $city->province_id;
            $city = $city->level == 2 ? $city->area_id : $city->parent_id;
        } else {
            $citys = Area::getData('510000');
            $province = 510000;
            $city = 510100;
        }
        $field = Electricize::getFieldInfo($city, $lng, $lat, $parking_fee, $type, $standard);
        $data = [
            'provinces' => $provinces,
            'province' => $province,
            'citys' => $citys,
            'city' => $city,
            'field' => $field,
        ];
        return $this->rJson($data);
    }

    /**
     * 获取市级id
     * @param string $area_id
     * @return string
     */
    public function actionArea($area_id = '')
    {
        return $this->rJson(Area::getData($area_id));
    }

    /**
     * 场地详情页数据
     * @param $no
     * @return string
     */
    public function actionDetails($no)
    {
        $data = Electricize::getEle($no);
        return $this->render('details', ['data' => $data]);
    }

    /**
     * 区间电价页数据
     * @param $no
     * @return string
     */
    public function actionElectricity($no)
    {
        $data = SectionRule::getInfo($no);
        return $this->render('electricity', ['data' => $data]);
    }
}