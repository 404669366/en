<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:52
 */

namespace app\controllers\estimate;


use app\controllers\basis\CommonController;

class EstimateController extends CommonController
{
    public function actionEstimate()
    {
        return $this->render('estimate');
    }
}