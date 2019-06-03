<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/30
 * Time: 15:55
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Recharge;
use vendor\helpers\Msg;

class RecordController extends CommonController
{
    /**
     * 充值记录
     * @return string|\yii\web\Response
     */
    public function actionRecord()
    {
        $id = \Yii::$app->user->id;
        if (isset($id) && $id) {
            $model = Recharge::find()->where(['user_id' => $id])->all();
            return $this->render('record', ['model' => $model]);
        }
        return $this->redirect(['login/login/login-t'], '请先登录');
    }

    public function actionAdd(){
        return $this->render('add');
    }
}