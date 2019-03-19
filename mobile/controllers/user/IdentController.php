<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/4
 * Time: 21:08
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Ident;
use vendor\helpers\Msg;

class IdentController extends CommonController
{
    /**
     * 合伙人认证
     * @return string
     */
    public function actionIdent()
    {
        return $this->render('ident', ['model' => Ident::findOne(['user_id' => \Yii::$app->user->id])]);
    }

    /**
     * 合伙人认证提交
     * @param int $id
     * @return \yii\web\Response
     */
    public function actionAddIdent($id = 0)
    {
        if (\Yii::$app->request->isPost) {
            if ($user_id = \Yii::$app->user->id) {
                $post = \Yii::$app->request->post();
                if ($model = Ident::findOne(['id' => $id, 'user_id' => $user_id])) {
                    if ($model->status == 5 || $model->status == 1) {
                        if ($post['money_ident']) {
                            $model->status = 3;
                        } else {
                            return $this->redirect(['ident'], '请上传打款凭证');
                        }
                    } else {
                        $model->status = 0;
                    }
                } else {
                    $model = new Ident();
                    $model->user_id = $user_id;
                    if (isset($post['now_type']) && $post['now_type'] == 2) {
                        $model->status = 3;
                    }
                    $model->created = time();
                }
                if ($model->load(['Ident' => $post]) && $model->validate() && $model->save()) {
                    return $this->redirect(['ident'], '提交成功,请等待审核');
                }
                return $this->redirect(['ident'], $model->errors());
            }
        }
        return $this->redirect(['ident'], '非法操作');
    }

    /**
     * 撤销合伙人认证
     * @return string
     */
    public function actionDelIdent()
    {
        Msg::set('非法操作');
        if ($model = Ident::findOne(['user_id' => \Yii::$app->user->id, 'status' => [0, 2, 5]])) {
            $model->delete();
            Msg::set('撤销成功');
        }
        return $this->redirect(['ident']);
    }

}