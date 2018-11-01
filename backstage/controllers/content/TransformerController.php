<?php

namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnTransformerBase;
use vendor\helpers\Msg;

Class TransformerController extends CommonController
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
        return $this->rTableData(EnTransformerBase::getPageData());
    }


    /**
     * 新增联系方式列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnTransformerBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnTransformerBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateTransformer();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add',['min'=>$model::getMin()]);
    }


    /**
     * 修改联系方式列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnTransformerBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnTransformerBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateTransformer();
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
        $model = EnTransformerBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateTransformer($id);
        }
        return $this->redirect(['list']);
    }
}
