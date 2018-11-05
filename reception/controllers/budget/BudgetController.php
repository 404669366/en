<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/5
 * Time: 15:18
 */

namespace app\controllers\budget;


use app\controllers\basis\BasisController;
use vendor\en\EnProductBase;

class BudgetController extends BasisController
{
    public function actionBaseBudget($data)
    {

        if ($re = EnProductBase::baseBudget(json_decode($data, true))) {
            return $this->rJson($re);
        }
        return $this->rJson('', false);
    }
}