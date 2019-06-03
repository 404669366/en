<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/29
 * Time: 18:21
 */

namespace app\controllers\charge;


use app\controllers\basis\CommonController;

class ChargeController extends CommonController
{
    public function actionCharge()
    {
        return $this->render('charge');
    }
}