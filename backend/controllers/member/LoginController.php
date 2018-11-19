<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 14:43
 */

namespace app\controllers\member;


use app\controllers\basis\BasisController;
use vendor\en\EnMemberBase;
use vendor\helpers\CaptchaCode;
use vendor\helpers\Msg;

class LoginController extends BasisController
{
    /**
     * 用户登录
     * @return string|\yii\web\Response
     */
    public function actionLogin()
    {
        $this->layout = false;
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if (CaptchaCode::validate($data['code'], 'Login')) {
                if (EnMemberBase::accountLogin($data['username'], $data['pwd'])) {
                    Msg::set('登录成功');
                    return $this->redirect([\Yii::$app->params['defaultRoute']]);
                }
                Msg::set('账号不存在');
            } else {
                Msg::set('验证码错误');
            }
        }
        return $this->render('login');
    }

    /**
     * 用户退出
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        Msg::set('注销成功');
        return $this->redirect(['login']);
    }

    /**
     * 图形验证码
     */
    public function actionCode()
    {
        $model = new CaptchaCode();
        $model->doimg('Login');
    }
}