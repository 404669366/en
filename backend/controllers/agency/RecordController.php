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
    /**
     * 备案列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list',['status'=>Constant::getFieldStatus([5,7,8,9,])]);
    }

    /**
     * 备案列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([5,7,8,9,],0,false));
    }

    public function actionDetail($id)
    {
        $model = Field::findOne(['id'=>$id,'status'=>[5,7,8,9,]]);
        return $this->render('detail',['model'=>$model]);
    }

}