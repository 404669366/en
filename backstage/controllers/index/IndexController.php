<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 10:19
 */

namespace app\controllers\index;

use app\controllers\basis\CommonController;

class IndexController extends CommonController
{
    public function actionMenu()
    {
        $this->layout = false;
        return $this->render('menu');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}