<?php

namespace app\controllers\login;


use app\controllers\basis\BasisController;
use vendor\en\User;
use vendor\helpers\Msg;
use vendor\helpers\Sms;

class LoginController extends BasisController
{
    /**
     * 账号密码登录
     * @return string
     */
    public function actionLoginP()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            Msg::set('手机号不能为空');
            if ($data['loginTel']) {
                Msg::set('密码不能为空');
                if ($data['pwd']) {
                    if ($model = User::findOne(['tel' => $data['loginTel']])) {
                        if (\Yii::$app->security->validatePassword($data['pwd'], $model->password)) {
                            \Yii::$app->user->login($model, 60 * 60 * 2);
                            return $this->redirect(['/user/user/user'], '登录成功');
                        }
                    }
                    Msg::set('账号或密码错误');
                }
            }
        }
        return $this->render('loginP');
    }

    /**
     * 手机验证码登录
     * @return string
     */
    public function actionLoginT()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            Msg::set('手机号不能为空');
            if ($data['loginTel']) {
                Msg::set('验证码有误');
                if (Sms::validateCode($data['loginTel'], $data['loginTelCode'])) {
                    Msg::set('账号不存在');
                    if ($model = User::findOne(['tel' => $data['loginTel']])) {
                        \Yii::$app->user->login($model, 60 * 60 * 2);
                        return $this->redirect(['/user/user/user'], '登录成功');
                    }
                }
            }
        }
        return $this->render('loginT');
    }

    /**
     * 用户注册
     * @return string
     */
    public function actionRegister()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            Msg::set('手机号不能为空');
            if ($data['loginTel']) {
                Msg::set('密码至少8位');
                if ($data['loginPwd'] && strlen($data['loginPwd']) >= 8) {
                    Msg::set('验证码有误');
                    if (Sms::validateCode($data['loginTel'], $data['loginCode'])) {
                        $model = new User();
                        $model->tel = $data['loginTel'];
                        $model->created = time();
                        $model->password = \Yii::$app->security->generatePasswordHash($data['loginPwd']);
                        if ($model->save()) {
                            \Yii::$app->user->login($model, 60 * 60 * 2);
                            return $this->redirect(['/user/user/user'], '注册成功');
                        }
                        Msg::set($model->errors());
                    }
                }
            }
        }
        return $this->render('register');
    }

    /**
     * 忘记密码
     * @return string
     */
    public function actionLoginR()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            Msg::set('手机号不能为空');
            if ($data['loginTel']) {
                Msg::set('账号不存在');
                if ($model = User::findOne(['tel' => $data['loginTel']])) {
                    Msg::set('密码至少8位');
                    if ($data['loginPwd'] && strlen($data['loginPwd']) >= 8) {
                        Msg::set('验证码有误');
                        if (Sms::validateCode($data['loginTel'], $data['loginCode'])) {
                            $model->password = \Yii::$app->security->generatePasswordHash($data['loginPwd']);
                            if ($model->save()) {
                                return $this->redirect(['/login/login/login-p'], '密码重置成功');
                            }
                            Msg::set($model->errors());
                        }
                    }
                }
            }
        }
        return $this->render('loginR');
    }

    /**
     * 退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->redirect(['index/index/index'], '退出成功');
    }
}