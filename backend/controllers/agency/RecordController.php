<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/19
 * Time: 18:42
 */

namespace app\controllers\agency;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;

class RecordController extends CommonController
{
    public function actionList()
    {
        return $this->render('list',['status'=>Constant::getFieldStatus([5,7,8,9,])]);
    }

    public function actionData()
    {
        return $this->rTableData(Field::getPageData([5,7,8,9,],\Yii::$app->user->id,1));
    }

    public function actionSupply($id)
    {

    }

}