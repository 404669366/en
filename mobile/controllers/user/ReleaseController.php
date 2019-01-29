<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/3
 * Time: 19:35
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Area;
use vendor\en\BasisField;
use vendor\en\Field;
use vendor\en\User;
use vendor\helpers\Constant;
use vendor\helpers\Helper;
use vendor\helpers\Msg;
use vendor\helpers\redis;

class ReleaseController extends CommonController
{
    /**
     * 发布基础场地
     * @return string
     */
    public function actionReleaseBasis()
    {
        return $this->render('releaseBasis');
    }

    /**
     * 发布基础场地
     * @return string|\yii\web\Response
     */
    public function actionAddBasis()
    {
        Msg::set('错误操作');
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if (!isset($data['area_id']) || !$data['area_id']) {
                return $this->render('releaseBasis', [], '请选择地域');
            }
            if (!isset($data['address']) || !$data['address']) {
                return $this->render('releaseBasis', [], '请填写详细地址');
            }
            if (!isset($data['intro']) || !$data['intro']) {
                return $this->render('releaseBasis', [], '请填写场地描述');
            }
            $user_id = \Yii::$app->user->id;
            if (!$user_id) {
                return $this->render('releaseBasis', [], '系统错误');
            }
            $model = new BasisField();
            $model->user_id = $user_id;
            $model->created = time();
            if ($model->load(['BasisField' => $data]) && $model->validate() && $model->save()) {
                redis::app()->rPush('BackendBasisField', $model->id);
                return $this->redirect(['/user/user/basis-field'], '发布成功');
            }
            Msg::set('发布失败');
        }
        return $this->render('releaseBasis');
    }

    /**
     * 发布真实场地
     * @return string
     */
    public function actionRelease()
    {
        return $this->render('release');
    }

    /**
     * 添加真实场地
     * @return \yii\web\Response
     */
    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Field();
            $post = \Yii::$app->request->post();
            if (!$post['area_id']) {
                return $this->redirect(['release'], '请选择地域');
            }
            if ($user = User::findOne(['tel' => $post['tel']])) {
                $model->local_id = $user->id;
            } else {
                return $this->redirect(['release'], '场地方账号不存在');
            }
            if ($cobber_id = \Yii::$app->user->id) {
                $area = Area::findOne(['area_id' => $post['area_id']]);
                $model->no = Helper::createNo('F');
                $model->lng = $area->lng;
                $model->lat = $area->lat;
                $model->created = time();
                $model->cobber_id = $cobber_id;
                if ($model->load(['Field' => $post]) && $model->validate()) {
                    if ($model->save()) {
                        return $this->redirect(['/user/field/track-field'], '发布成功');
                    }
                }
                return $this->redirect(['release'], $model->errors());
            }
        }
        return $this->redirect(['release'], '非法操作');
    }
}