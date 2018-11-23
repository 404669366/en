<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\commissioner;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;

class ScoreController extends CommonController
{
    /**
     * 专员评分列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::getFieldStatus(),
            'type' => Constant::getFieldType()
        ]);
    }

    /**
     *  专员评分列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([0, 1, 2], \Yii::$app->user->id, 1));
    }
}