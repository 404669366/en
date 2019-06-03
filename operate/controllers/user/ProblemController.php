<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/30
 * Time: 15:30
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

class ProblemController extends CommonController
{
    public function actionProblem(){
        return $this->render('problem');
    }
}