<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\audit;


use app\controllers\basis\CommonController;

class SecondController extends CommonController
{
    public function actionList()
    {
        return $this->render('list');
    }

    public function actionData()
    {

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
}