<?php

namespace app\controllers\login;


use app\controllers\basis\BasisController;

class LoginController extends BasisController
{
    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        return $this->render('register');
    }
}