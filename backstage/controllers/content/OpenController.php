<?php
namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnOpenBase;
use vendor\helpers\Msg;

Class OpenController extends CommonController{
    /**
     * 开放列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 开放列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnOpenBase::getPageData());
    }


    /**
     * 新增开放列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnOpenBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnOpenBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateOpen();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add');
    }



    /**
     * 修改开放列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnOpenBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnOpenBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateOpen();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }



    /**
     * 删除开放列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnOpenBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateOpen($id);
        }
        return $this->redirect(['list']);
    }
}
