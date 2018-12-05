<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/5
 * Time: 10:31
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Field;

class FieldController extends CommonController
{

    /**
     * 场地跟踪
     * @return string
     */
    public function actionTrackField()
    {
        return $this->render('track', ['field' => Field::getTrack(\Yii::$app->user->id)]);
    }

    /**
     * 合伙人抢单
     * @return \yii\web\Response
     */
    public function actionRob()
    {
        return $this->goBack(Field::rob());
    }

    /**
     * 场地详情
     * @param $no
     * @return string
     */
    public function actionDetail($no)
    {
        if ($model = Field::findOne(['no' => $no, 'cobber_id' => \Yii::$app->user->id, 'status' => [0, 1, 2, 4, 5, 6, 8, 9, 10, 11, 12, 14, 15, 18]])) {
            return $this->render('detail', ['field' => $model]);
        }
        return $this->goBack('非法操作');
    }
}