<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\audit;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\en\Member;
use vendor\helpers\Constant;

class SecondController extends CommonController
{
    /**
     * 二审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus()]);
    }

    /**
     * 二审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([3, 4, 5]));
    }

    /**
     * 二审详情列表
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render(
            'detail', ['model' => Field::findOne($id),
            'status' => Constant::getFieldStatus(),
            'types' => Constant::getFieldType(),
            'members' => Member::getMemberByJob(4)
        ]);
    }
}