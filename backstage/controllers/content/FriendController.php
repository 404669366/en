<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/25
 * Time: 14:49
 */

namespace app\controllers\content;


use app\controllers\basis\CommonController;
use vendor\en\EnFriendBase;
use vendor\helpers\Msg;

class FriendController extends CommonController
{
    /**
     * 导航栏列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 导航栏列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnFriendBase::getPageData());
    }

    /**
     * 新增导航栏
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnFriendBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnFriendBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateFriend();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add');
    }

    /**
     * 修改导航栏
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnFriendBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnFriendBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateFriend();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 删除导航栏
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnFriendBase::findOne($id);
        Msg::set('删除失败');
        if ($model) {
            $model->updateFriend($id);
            $model->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}