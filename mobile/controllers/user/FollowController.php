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
        Msg::set('请先登录', 'PopupMsg');
        if(!\Yii::$app->user->isGuest){
            Msg::set('错误操作', 'PopupMsg');
            if ($no) {
                Msg::set('您已关注', 'PopupMsg');
                if ($model = Follow::notFollow($no)) {
                    $follow = new Follow();
                    $follow->user_id = \Yii::$app->user->id;
                    $follow->field_id = $model->id;
                    $follow->created = time();
                    $model->attention = $model->attention + 1;
                    if ($model->save() && $follow->save()) {
                        Msg::set('关注成功', 'PopupMsg');
                    } else {
                        Msg::set('系统错误', 'PopupMsg');
                    }
                }
            }
        }
        return $this->goBack();
    }

    /**
     * 取消关注
     * @param string $no
     * @return \yii\web\Response
     */
    public function actionCancel($no = '')
    {
        Msg::set('错误操作', 'PopupMsg');
        if ($no && \Yii::$app->user->id) {
            $field = Field::findOne(['no' => $no, 'status' => Constant::getShowStatus()]);
            if ($field && $field->attention > 0) {
                $field->attention = $field->attention - 1;
                if ($field->save()) {
                    if ($one = Follow::findOne(['user_id' => \Yii::$app->user->id, 'field_id' => $field->id])) {
                        $one->delete();
                    }
                }
            }
            Msg::set('取消关注成功', 'PopupMsg');
        }
        return $this->goBack();
    }
}