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
        $data = \Yii::$app->request->get();
        if (!$data['loginPTel']) {
            return $this->rJson([], false, '手机号不能为空');
        }
        if (!$data['pwd']) {
            return $this->rJson([], false, '密码不能为空');
        }
        if ($model = User::findOne(['tel' => $data['loginPTel']])) {
            if (\Yii::$app->security->validatePassword($data['pwd'], $model->password)) {
                \Yii::$app->user->login($model, 60 * 60 * 2);
                return $this->rJson([], true, '登录成功');
            }
        }
        return $this->rJson([], false, '账号或密码错误');
    }

    /**
     * 手机验证码登录
     * @return string
     */
    public function actionLoginT()
    {
        $data = \Yii::$app->request->get();
        if (!$data['loginTel']) {
            return $this->rJson([], false, '手机号不能为空');
        }
        if (Sms::validateCode($data['loginTel'], $data['loginTelCode'])) {
            $model = User::findOne(['tel' => $data['loginTel']]);
            if ($model) {
                \Yii::$app->user->login($model, 60 * 60 * 2);
                return $this->rJson([], true, '登录成功');
            }
            return $this->rJson([], false, '账号不存在');
        }
        return $this->rJson([], false, '验证码有误');
    }

    /**
     * 用户注册
     * @return string
     */
    public function actionRegister()
    {
        $data = \Yii::$app->request->get();
        if (!$data['registerTel']) {
            return $this->rJson([], false, '手机号不能为空');
        }
        if (!$data['registerPwd'] || strlen($data['registerPwd']) < 8) {
            return $this->rJson([], false, '密码至少8位');
        }
        if (isset($data['registerOk']) && $data['registerOk']) {
            if (Sms::validateCode($data['registerTel'], $data['registerCode'])) {
                $model = new User();
                $model->tel = $data['registerTel'];
                $model->password = \Yii::$app->security->generatePasswordHash($data['registerPwd']);
                $model->created = time();
                if ($model->save()) {
                    \Yii::$app->user->login($model, 60 * 60 * 2);
                    return $this->rJson([], true, '注册成功');
                }
                return $this->rJson([], false, $model->errors());
            }
            return $this->rJson([], false, '验证码有误');
        }
        return $this->rJson([], false, '同意协议才能注册哟');
    }

    /**
     * 忘记密码
     * @return string
     */
    public function actionLoginR()
    {
        $data = \Yii::$app->request->get();
        if (!$data['reLoginTel']) {
            return $this->rJson([], false, '手机号不能为空');
        }
        if ($model = User::findOne(['tel' => $data['reLoginTel']])) {
            if (!$data['reLoginPwd'] || strlen($data['reLoginPwd']) < 8) {
                return $this->rJson([], false, '密码至少8位');
            }
            if (Sms::validateCode($data['reLoginTel'], $data['reLoginCode'])) {
                $model->password = \Yii::$app->security->generatePasswordHash($data['reLoginPwd']);
                if ($model->save()) {
                    \Yii::$app->user->login($model, 60 * 60 * 2);
                    return $this->rJson([], true, '修改成功');
                }
                return $this->rJson([], false, $model->errors());
            }
            return $this->rJson([], false, '验证码有误');
        }
        return $this->rJson([], false, '账号不存在');
    }

    /**
     * 退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        Msg::set('注销成功', 'PopupMsg');
        return $this->goBack();
    }
}