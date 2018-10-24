<?php
namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnModuleBase;
use vendor\helpers\Msg;

Class ModuleController extends CommonController{
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
        return $this->rTableData(EnModuleBase::getPageData());
    }


    /**
     * 新增模块列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnModuleBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnModuleBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateModule();
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
        $model = EnModuleBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnModuleBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateModule();
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
        $model = EnModuleBase::findOne($id);
        $model->delete();
        if ($model->delete()) {
            Msg::set('删除成功');
        }
        Msg::set('删除失败');
        return $this->redirect(['edit?id=' . $id]);
    }
}
