<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\salesman;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;

class FirstController extends CommonController
{
    /**
     * 业务员初审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus()]);
    }

    /**
     *  业务员初审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([0, 1, 2], \Yii::$app->user->id));
    }
}