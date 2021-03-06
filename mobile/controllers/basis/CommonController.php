<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/30
 * Time: 21:08
 */

namespace app\controllers\basis;


use vendor\helpers\Url;
use vendor\helpers\Wechat;

class CommonController extends BasisController
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            Url::remember();
            if (Wechat::isWechat()) {
                return $this->redirect(Wechat::getUserAuthorizeCodeUrl())->send();
            }
            return $this->redirect(['/login/login/login-t'], '请先登录')->send();
        }
        return parent::beforeAction($action);
    }
}