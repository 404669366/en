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
use vendor\en\FollowIdent;
use vendor\en\User;
use vendor\helpers\Msg;

class UserController extends CommonController
{
    /**
     * 用户中心
     * @return string
     */
    public function actionUser()
    {
        return $this->render('user');
    }

    /**
     * 关注场地
     * @return string
     */
    public function actionFollow()
    {
        return $this->render('follow', ['follow' => Follow::getFollow(\Yii::$app->user->id)]);
    }

    /**
     * 关注合伙人
     * @return string
     */
    public function actionFollowCobber()
    {
        return $this->render('follow-cobber', ['follow' => FollowIdent::getFollow(\Yii::$app->user->id)]);
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
     * 修改密码页
     * @return string
     */
    public function actionUpdate()
    {
        return $this->render('update');
    }

    /**
     * 修改密码
     * @return \yii\web\Response
     */
    public function actionModifyPassword()
    {
        Msg::set('非法操作');
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model = User::findOne(['id' => \Yii::$app->user->id])) {
                if (!$data['password'] || !$data['password1'] || !$data['password2']) {
                    return $this->redirect(['update'], '密码不能为空');
                }
                if ($data['password1'] != $data['password2']) {
                    return $this->redirect(['update'], '两次输入不一致');
                }
                Msg::set('密码错误');
                if (\Yii::$app->security->validatePassword($data['password'], $model->password)) {
                    Msg::set('新密码不能与旧密码相同');
                    if ($data['password'] !== $data['password1']) {
                        $model->password = \Yii::$app->security->generatePasswordHash($data['password1']);
                        if ($model->save()) {
                            return $this->redirect(['user/user/user'], '修改密码成功');
                        }
                        Msg::set($model->errors());
                    }
                }
            }
        }
        return $this->redirect(['update']);
    }
}