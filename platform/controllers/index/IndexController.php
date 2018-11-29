<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/11/18
 * Time: 16:50
 */

namespace app\controllers\index;


use app\controllers\basis\BasisController;
use vendor\en\Field;
use vendor\helpers\BasisData;

class IndexController extends BasisController
{
    public function actionIndex()
    {
        return $this->render('index',['data'=>BasisData::getBasisData()]);
    }
    public function actionData(){
        return $this->rJson(

        );
    }
    public function actionList()
    {
        return $this->render('list');
    }

    public function actionDetails()
    {
        return $this->render('details');

    }
}