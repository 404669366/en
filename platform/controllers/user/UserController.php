<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:50
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\BasisField;
use vendor\en\Follow;
use vendor\en\Ident;

class UserController extends CommonController
{
    /**
     * 用户中心
     * @return string
     */
    public function actionUser()
    {
        return $this->render('user', ['follow' => Follow::getFollow(\Yii::$app->user->id)]);
    }

    /**
     * 合伙人认证
     * @return string
     */
    public function actionIdent()
    {
        return $this->render('ident');
    }

    /**
     * 合伙人认证提交
     * @return string
     */
    public function actionAddIdent()
    {
        if (\Yii::$app->request->isPost && $user_id = \Yii::$app->user->id) {
            $post = \Yii::$app->request->post();
            $model = new Ident();
            $model->created = time();
            $model->user_id = $user_id;
            if (isset($post['now_type']) && $post['now_type'] == 2) {
                $model->status = 3;
            }
            if ($model->load(['Ident' => $post]) && $model->validate() && $model->save()) {
                return $this->render('ident', [], '提交成功,请等待审核');
            }
            return $this->render('ident', [], $model->errors());
        }
        return $this->render('ident', [], '非法操作');
    }

    /**
     * 合伙人认证升级
     * @param int $id
     * @return string
     */
    public function actionUpdateIdent($id = 0)
    {
        if (\Yii::$app->request->isPost && $user_id = \Yii::$app->user->id) {
            $post = \Yii::$app->request->post();
            if ($model = Ident::findOne(['id' => $id, 'user_id' => $user_id])) {
                $model->status = 3;
                if ($model->load(['Ident' => $post]) && $model->validate() && $model->save()) {
                    return $this->render('ident', [], '提交成功,请等待审核');
                }
                return $this->render('ident', [], $model->errors());
            }
        }
        return $this->render('ident', [], '非法操作');
    }

    /**
     * 基础场地
     * @return string
     */
    public function actionBasisField()
    {
        return $this->render('basis', ['basis' => BasisField::getBasisData()]);
    }

    /**
     * 场地跟踪
     * @return string
     */
    public function actionTrackField()
    {
        return $this->render('track', ['field' => Follow::getFollow(\Yii::$app->user->id)]);
    }

    /**
     * 修改密码
     * @return string
     */
    public function actionUpdate()
    {
        return $this->render('update');
    }
}