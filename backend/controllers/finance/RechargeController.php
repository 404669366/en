<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/28
 * Time: 15:11
 */

namespace app\controllers\finance;


use app\controllers\basis\CommonController;
use vendor\en\Recharge;
use vendor\helpers\Constant;

class RechargeController extends CommonController
{
    public function actionList()
    {
        return $this->render('list', ['source' => Constant::getSource()]);
    }

    public function actionData()
    {
        return $this->rTableData(Recharge::getPageData());
    }
}