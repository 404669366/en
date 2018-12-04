<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/4
 * Time: 21:36
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Intention;

class IntentionController extends CommonController
{
    /**
     * 意向列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['model' => Intention::getIntentionData()]);
    }
}