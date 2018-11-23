<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:52
 */

namespace app\controllers\estimate;

use app\controllers\basis\BasisController;

class EstimateController extends BasisController
{
    public function actionEstimate()
    {
        return $this->render('estimate');
    }
}