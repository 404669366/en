<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/30
 * Time: 15:41
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

class ChargeController extends CommonController
{
    public function actionCharge()
    {
        return $this->render('charge');
    }
}