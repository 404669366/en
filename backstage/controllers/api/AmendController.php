<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/17
 * Time: 15:19
 */

namespace app\controllers\api;

use \app\controllers\basis\ApiController;

class AmendController extends ApiController
{
    public function actionA(){
        return $this->rJson('123');
    }
}