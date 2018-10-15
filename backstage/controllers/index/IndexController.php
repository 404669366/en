<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 10:19
 */

namespace app\controllers\index;

use app\controllers\basis\CommonController;

class IndexController extends CommonController
{
    public function actionMenu()
    {
        $this->layout = false;
        $user = \Yii::$app->user->getIdentity() ? \Yii::$app->user->getIdentity(): '';
        $data = [
            'username'=> $user? $user->username : '',
            'menus'=>[],
        ];
        return $this->render('menu',['data'=>$data]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}