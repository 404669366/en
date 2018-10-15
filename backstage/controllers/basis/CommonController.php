<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 14:41
 */

namespace app\controllers\basis;


use vendor\helpers\Msg;

class CommonController extends BasisController
{
    public function beforeAction($action)
    {
        var_dump(111);exit();
        $re = parent::beforeAction($action);
        if (\Yii::$app->user->isGuest) {
            Msg::set('请先登录');
            return $this->redirect([\Yii::$app->params['loginRoute']]);
        }
        return $re;
    }
}