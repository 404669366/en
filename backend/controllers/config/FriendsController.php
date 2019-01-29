<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/3
 * Time: 11:06
 */

namespace app\controllers\config;


use app\controllers\basis\CommonController;
use vendor\en\Friends;
use vendor\helpers\Msg;

class FriendsController extends CommonController
{
    /**
     * 渲染友情链接列表页
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 获取友情链接列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Friends::getPageData());
    }

    /**
     * 添加友情链接
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Friends();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['Friends' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                $model->updateFriends();
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add', ['model' => $model]);
    }

    /**
     * 修改友情链接
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Friends::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['Friends' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                $model->updateFriends();
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 删除友情链接
     * @param $id
     */
    public function actionDel($id)
    {
        $model = Friends::findOne($id);
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateFriends($id);
        }
        Msg::set($model->errors());
    }
}