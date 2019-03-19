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
use yii\web\User;

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

    public function actionDetail($cobber_id){
        if($cobber_id && \Yii::$app->request->user->id){
            $user_id = \Yii::$app->request->user->id;
            $data = \vendor\en\User::find()
                ->leftJoin(Field::tableName().' f','u.id= f.user_id')
                ->leftJoin(Ident::tableName().' i','u.id= i.user_id')
                ->where(['cobber_id'=>$cobber_id,'id'=>\Yii::$app->user->id])
                ->select('id,')

        }
        return $this->redirect(['index','model'=>\Yii::$app->request->post()]);    }
}