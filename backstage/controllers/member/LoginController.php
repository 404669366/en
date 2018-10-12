<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 14:43
 */

namespace app\controllers\member;


use app\controllers\basis\BasisController;
use vendor\helpers\CaptchaCode;

class LoginController extends BasisController
{
    public function actionLogin()
    {
        $this->layout = false;
        return $this->render('login');
    }

    public function actionLogout()
    {
        //\Yii::$app->user->logout();
        return $this->redirect(['login']);
    }

    public function actionCode()
    {
        $model = new CaptchaCode();
        $model->doimg('Login');
    }
}