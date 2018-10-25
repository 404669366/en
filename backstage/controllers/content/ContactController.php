<?php

namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnContactBase;
use vendor\helpers\Msg;

Class ContactController extends CommonController
{
    /**
     * 联系方式列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 联系方式列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnContactBase::getPageData());
    }


    /**
     * 新增联系方式列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnContactBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnContactBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateContact();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add');
    }


    /**
     * 修改联系方式列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnContactBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnContactBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateContact();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }


    /**
     * 删除联系方式列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnContactBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateContact($id);
        }
        return $this->redirect(['list']);
    }
}
