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

class SecondController extends CommonController
{
    public function actionList()
    {
        return $this->render('list');
    }

    public function actionData()
    {
        return $this->rTableData(Field::getPageData());
    }

    public function actionDetail($id)
    {

    }
}