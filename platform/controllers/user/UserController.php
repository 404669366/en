<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:50
 */

namespace app\controllers\user;


use app\controllers\basis\BasisController;

class UserController extends BasisController
{
    public function actionUser()
    {
        return $this->render('user');
    }
}