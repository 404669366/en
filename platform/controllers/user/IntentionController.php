<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/4
 * Time: 21:36
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\en\Intention;
use vendor\helpers\Constant;
use vendor\helpers\Helper;
use vendor\helpers\Msg;

class IntentionController extends CommonController
{
    /**
     * 意向列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['data' => Intention::getIntentionData()]);
    }

    /**
     * 添加意向
     * @return string
     */
    public function actionAdd()
    {
        if ($user_id = \Yii::$app->user->id) {
            $get = \Yii::$app->request->get();
            if (!isset($get['money']) || !$get['money']) {
                return $this->rJson([], false, '请填写意向金额');
            }
            if (isset($get['no']) && $get['no'] && $model = Field::findOne(['no' => $get['no'], 'status' => 15])) {
                if (!Intention::findOne(['user_id' => $user_id, 'field_id' => $model->id, 'status' => [0, 2, 3, 4]])) {
                    $intention = new Intention();
                    $intention->no = Helper::createNo('I');
                    $intention->field_id = $model->id;
                    $intention->user_id = $user_id;
                    $intention->money = $get['money'];
                    $intention->created = time();
                    if ($intention->save()) {
                        return $this->rJson();
                    }
                    return $this->rJson([], false, $intention->errors());
                }
                return $this->rJson([], false, '您已有该场地意向,请不要重复提交');
            }
            return $this->rJson([], false, '抱歉,融资已结束...');
        }
        return $this->rJson([], false, '非法操作');
    }

    /**
     * 意向管理列表
     * @return string
     */
    public function actionManage()
    {
        return $this->render('manage', ['data' => Intention::getIntentionManage()]);
    }

    /**
     * 意向管理详情页面
     * @param $no
     * @return string
     */
    public function actionDetail($no)
    {
        $model = Intention::find()->alias('i')
            ->leftJoin(Field::tableName() . ' f', 'i.field_id=f.id')
            ->where(['i.no' => $no, 'f.cobber_id' => \Yii::$app->user->id])
            ->one();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['Intention' => $post]) && $model->validate()) {
                $model->status = 2;
                if ($model->save()) {
                    return $this->redirect(['manage'], '提交成功');
                }
            }
            Msg::set($model->errors());
        }
        return $this->render('detail', ['data' => $model]);
    }

    /**
     * 放弃意向
     * @return string
     */
    public function actionDel()
    {
        if (\Yii::$app->request->isGet) {
            $get = \Yii::$app->request->get();
            if (!isset($get['no']) || !$get['no']) {
                return $this->rJson([], false, '非法操作');
            }
            if (!isset($get['explain']) || !$get['explain']) {
                return $this->rJson([], false, '请填写放弃说明');
            }
            $model = Intention::find()->alias('i')
                ->leftJoin(Field::tableName() . ' f', 'i.field_id=f.id')
                ->where(['i.no' => $get['no'], 'f.cobber_id' => \Yii::$app->user->id])
                ->one();
            if ($model) {
                $model->status = 1;
                $model->remark = $get['explain'];
                if ($model->save()) {
                    return $this->rJson();
                }
            }
        }
        return $this->rJson([], false, '非法操作');
    }
}