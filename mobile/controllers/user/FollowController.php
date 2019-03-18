<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/3
 * Time: 13:50
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\en\Follow;
use vendor\en\FollowIdent;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class FollowController extends CommonController
{
    /**
     * 关注场地
     * @param string $no
     * @return \yii\web\Response
     */
    public function actionFollow($no = '')
    {
        Msg::set('错误操作');
        if ($no && \Yii::$app->user->id) {
            Msg::set('您已关注');
            if (!Follow::isFollow($no)) {
                $model = Field::findOne(['no' => $no, 'status' => Constant::getShowStatus()]);
                $follow = new Follow();
                $follow->user_id = \Yii::$app->user->id;
                $follow->field_id = $model->id;
                $follow->created = time();
                $model->attention += 1;
                Msg::set('系统错误');
                if ($model->save() && $follow->save()) {
                    Msg::set('关注成功');
                }
            }
        }
        return $this->redirect('/index/index/details.html?no=' . $no);
    }

    /**
     * 取消关注
     * @param string $no
     * @return \yii\web\Response
     */
    public function actionCancel($no = '')
    {
        Msg::set('错误操作');
        if ($no && \Yii::$app->user->id) {
            $field = Field::findOne(['no' => $no, 'status' => Constant::getShowStatus()]);
            if ($field && $field->attention > 0) {
                $field->attention -= 1;
                if ($field->save()) {
                    if ($one = Follow::findOne(['user_id' => \Yii::$app->user->id, 'field_id' => $field->id])) {
                        $one->delete();
                    }
                }
            }
            Msg::set('取消关注成功');
        }
        return $this->goBack();
    }

    /**
     * 关注合伙人
     * @param $cobber_id
     * @return \yii\web\Response
     */
    public function actionFollowCobber($cobber_id)
    {
        Msg::set('错误操作');
        if ($cobber_id && \Yii::$app->user->id) {
            Msg::set('您已关注');
            $user_id = \Yii::$app->user->id;
            if (!FollowIdent::getFollowIdent($cobber_id, $user_id)) {
                $model = new FollowIdent();
                $model->user_id = $user_id;
                $model->cobber_id = $cobber_id;
                $model->created = time();
                if ($model->save()) {
                    Msg::set('关注成功');
                }
            }

        }
        return $this->redirect('/index/index/cobber-field.html?cobber_id=' . $cobber_id);
    }

    /**
     * 取消关注合伙人
     * @param $cobber_id
     * @return \yii\web\Response
     */
    public function actionFollowCancel($cobber_id)
    {
        Msg::set('操作错误');
        if ($cobber_id && \Yii::$app->user->id) {
            $user_id = \Yii::$app->user->id;
            if ($model = FollowIdent::getFollowIdent($cobber_id, $user_id)) {
                $model->delete();
            }
            Msg::set('取消关注成功');
        }
        return $this->redirect('/index/index/cobber-field.html?cobber_id=' . $cobber_id);
    }
}