<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:52
 */

namespace app\controllers\estimate;

use app\controllers\basis\BasisController;
use vendor\en\Field;

class EstimateController extends BasisController
{
    /**
     * 收益测算页
     * @return string
     */
    public function actionEstimate()
    {
        return $this->render('estimate');
    }

    /**
     * 收益测算接口
     * @param $power
     * @param $hours
     * @return string
     */
    public function actionData($power, $hours)
    {
        return $this->rJson(Field::budget($power, $hours));
    }
}