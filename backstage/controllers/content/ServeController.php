<?php
namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnServeBase;
use vendor\helpers\Msg;

Class ServeController extends CommonController{
    /**
     * 模块列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 模块列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnServeBase::getPageData());
    }


    /**
     * 新增模块列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnServeBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnServeBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateServe();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add');
    }



    /**
     * 修改模块列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnServeBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnServeBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateServe();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }



    /**
     * 删除模块列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnServeBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateServe($id);
        }
        return $this->redirect(['list']);
    }
}
