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

class FifthController extends CommonController
{
    /**
     * 一审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus()]);
    }

    /**
     * 一审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([]));
    }

    /**
     * 一审详情列表
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