<?php

namespace app\controllers\login;


use app\controllers\basis\BasisController;
use vendor\en\User;
use vendor\helpers\Msg;
use vendor\helpers\Sms;
use vendor\helpers\Url;
use vendor\helpers\Wechat;

class LoginController extends BasisController
{
    /**
     * 手机验证码登录
     * @return string
     */
    public function actionLoginT()
    {
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            Msg::set('手机号不能为空');
            if ($data['tel']) {
                Msg::set('验证码有误');
                if (Sms::validateCode($data['tel'], $data['code'])) {
                    if ($model = User::findOne(['tel' => $data['tel']])) {
                        if (Wechat::isWechat()) {
                            $model->wechat = \Yii::$app->session->get('UserWechat', '');
                        }
                        $model->save();
                    } else {
                        $model = new User();
                        $model->tel = $data['tel'];
                        $model->password = \Yii::$app->security->generatePasswordHash('88888888');
                        $model->created=time();
                        if (Wechat::isWechat()) {
                            $model->wechat = \Yii::$app->session->get('UserWechat', '');
                        }
                        $model->save();
                    }
                    \Yii::$app->user->login($model, 60 * 60 * 2);
                    return $this->redirect(['user/user/user'], '登录成功');
                }
            }
        }
        return $this->render('login-t');
    }

    /**
     * 微信登录回调
     * @param string $code
     * @return \yii\web\Response
     */
    public function actionLoginW($code = '')
    {
        if ($code) {
            if ($info = Wechat::getUserAuthorizeAccessToken($code)) {
                if ($model = User::findOne(['wechat' => $info['openid']])) {
                    \Yii::$app->user->login($model, 60 * 60 * 2);
                    return $this->redirect(Url::getUrl(), '登录成功');
                }
                \Yii::$app->session->set('UserWechat', $info['openid']);
            }
        }
        return $this->redirect(['login/login/login-t']);
    }

    /**
     * 退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        if (Wechat::isWechat()) {
            if ($model = User::findOne(\Yii::$app->user->id)) {
                $model->wechat = '';
                $model->save();
            }
        }
        \Yii::$app->user->logout();
        return $this->redirect(['login/login/login-t'], '退出成功');
    }
}