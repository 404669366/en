<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/18
 * Time: 17:05
 */

namespace app\controllers\test;


use app\controllers\basis\CommonController;

class TestController extends CommonController
{
    public function actionTest(){
        return $this->render('summernote');
    }
}