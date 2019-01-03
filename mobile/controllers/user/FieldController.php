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

    /**
     * 场地放弃
     * @param $no
     * @param $remark
     * @return string
     */
    public function actionDel($no, $remark)
    {
        if ($no && $remark) {
            if ($user_id = \Yii::$app->user->id) {
                if ($model = Field::findOne(['no' => $no, 'cobber_id' => $user_id, 'status' => [1, 6, 11, 15]])) {
                    if ($model->status == 1) {
                        $model->status = 3;
                    }
                    if ($model->status == 6) {
                        $model->status = 7;
                    }
                    if ($model->status == 11) {
                        $model->status = 13;
                    }
                    if ($model->status == 15) {
                        $model->status = 17;
                    }
                    $model->remark = $remark;
                    if ($model->save()) {
                        return $this->rJson();
                    }
                }
            }
        }
        return $this->rJson([], false, '请填写放弃说明');
    }

    /**
     * 场地操作保存
     * @param $no
     * @return string|\yii\web\Response
     */
    public function actionUpdate($no)
    {
        if ($user_id = \Yii::$app->user->id) {
            if ($model = Field::findOne(['no' => $no, 'cobber_id' => $user_id, 'status' => [1, 6, 11, 16]])) {
                $post = \Yii::$app->request->post();
                if ($model->status == 1 || $model->status == 6) {
                    $model->status = 4;
                }
                if ($model->status == 11 || $model->status == 16) {
                    $model->status = 14;
                }
                if ($model->load(['Field' => $post]) && $model->validate() && $model->save()) {
                    return $this->render('detail', ['field' => $model], '提交成功');
                }
                return $this->render('detail', ['field' => $model], $model->errors());
            }
        }
        return $this->redirect(['track-field'], '非法操作');
    }
}