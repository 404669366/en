<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/30
 * Time: 21:08
 */

namespace app\controllers\basis;


class CommonController extends BasisController
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['/index/index/index'], '请先登录')->send();
        }
        return parent::beforeAction($action);
    }
}