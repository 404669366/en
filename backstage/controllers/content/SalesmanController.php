<?php
namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnSalesmanBase;
use vendor\helpers\Msg;

class SalesmanController extends CommonController{
    /**
     * 业务员列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 业务员列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnSalesmanBase::getPageData());
    }


    /**
     * 新增业务员列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnSalesmanBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnSalesmanBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateSalesman();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add');
    }



    /**
     * 修改业务员列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnSalesmanBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnSalesmanBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateSalesman();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }



    /**
     * 删除业务员列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnSalesmanBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateSalesman($id);
        }
        return $this->redirect(['list']);
    }
}