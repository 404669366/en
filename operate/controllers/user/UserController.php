<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/29
 * Time: 11:01
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

class UserController extends CommonController
{
    public function actionUser()
    {
        return $this->render('user');
    }
}