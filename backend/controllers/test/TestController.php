<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/24
 * Time: 17:14
 */

namespace app\controllers\test;


use app\controllers\basis\CommonController;

class TestController extends CommonController
{
    public function actionTest()
    {
        return $this->render('test');
    }
}