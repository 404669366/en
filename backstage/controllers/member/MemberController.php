<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/16
 * Time: 17:37
 */

namespace app\controllers\member;


use app\controllers\basis\CommonController;
use vendor\en\EnMemberBase;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class MemberController extends CommonController
{
    /**
     * 后台用户列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::memberStatus(),
            'jobs' => [],
        ]);
    }

    /**
     * 后台用户列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnMemberBase::getPageData());
    }

    /**
     * 新增后台用户
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnMemberBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $post['password'] = \Yii::$app->security->generatePasswordHash($post['password']);
            $post['created_at'] = time();
            if ($model->load(['EnMemberBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add', [
        ]);
    }

    /**
     * 修改后台用户
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnMemberBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['password']) && $post['password']) {
                $post['password'] = \Yii::$app->security->generatePasswordHash($post['password']);
            }
            if ($model->load(['EnMemberBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * 删除后台用户
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnMemberBase::findOne($id);
        Msg::set('删除失败');
        if ($model) {
            $model->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}