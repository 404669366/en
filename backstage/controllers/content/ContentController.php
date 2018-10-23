<?php
namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnContentBase;

class ContentController extends CommonController{
    /**
     * 文本内容列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }
    /**
     * 文本内容列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnContentBase::getPageData());
    }

    /**
     * 修改文本内容列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnContentBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (!$model->created_at) {
                $model->created_at = time();
            }
            if ($model->load(['EnContentBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }
    /**
     * 删除文本内容列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnContentBase::findOne($id);
        $model->delete();
        if($model->delete()){
            Msg::set('删除成功');
        }
        Msg::set('删除失败');
        return $this->redirect(['edit?id=' . $id]);
    }
}