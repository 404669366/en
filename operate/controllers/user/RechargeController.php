<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/30
 * Time: 15:49
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

class RechargeController extends CommonController
{
    public function actionRecharge()
    {
        return $this->render('recharge');
    }
}