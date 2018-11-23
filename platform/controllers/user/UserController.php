<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:50
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

class UserController extends CommonController
{
    public function actionCenter()
    {
        return $this->render('center');
    }
}