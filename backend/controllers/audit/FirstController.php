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
use vendor\helpers\Constant;

class FirstController extends CommonController
{
    public function actionList()
    {
        return $this->render('list',['status'=>Constant::getFieldStatus()]);
    }

    public function actionData()
    {
        return $this->rTableData();
    }

    public function actionDetail($id)
    {

    }

    public function actionMyList()
    {
        return $this->render('myList');
    }

    public function actionMyData()
    {

    }

    public function actionEdit($id)
    {

    }

    public function actionSupply($id)
    {

    }
}