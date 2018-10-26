<?php

namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnServeBase;
use vendor\helpers\Msg;

Class ServeController extends CommonController
{
    /**
     * 服务列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 服务列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnServeBase::getPageData());
    }


    /**
     * 新增服务列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnServeBase();
        return $this->render('add');
    }


    /**
     * 修改服务列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnServeBase::findOne($id);
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 保存服务配置
     * @return string
     */
    public function actionSave()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['id']) && $post['id']) {
                $model = EnServeBase::findOne($post['id']);
            } else {
                $model = new EnServeBase();
            }
            if ($model->load(['EnServeBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateServe();
                Msg::set('保存成功');
                return $this->rJson();
            }
            return $this->rJson([], false, $model->errors());
        }
        return $this->rJson([], false, '请求错误');
    }


    /**
     * 删除服务列表页数据
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
