<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/30
 * Time: 21:08
 */

namespace app\controllers\basis;


use vendor\helpers\Msg;

class CommonController extends BasisController
{
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest) {
            Msg::set('请先登录', 'PopupMsg');
            return $this->goBack();
        }
        return parent::beforeAction($action);
    }
}