<?php

namespace app\controllers\content;

use app\controllers\basis\CommonController;
use vendor\en\EnContentBase;
use vendor\helpers\Helper;
use vendor\helpers\Msg;

class ContentController extends CommonController
{
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
     * 新增文本内容列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        return $this->render('add', [
            'no' => Helper::randStr(3, 8),
        ]);
    }

    public function actionDo()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['id']) && $post['id']) {
                $model = EnContentBase::findOne($post['id']);
            } else {
                $model = new EnContentBase();
                $model->created_at = time();
                $model->user = \Yii::$app->user->id;
            }
            if ($model->load(['EnContentBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateContent();
                Msg::set('保存成功');
                return $this->rJson();
            } else {
                return $this->rJson([], false, $model->errors());
            }
        }
    }


    /**
     * 修改文本内容列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnContentBase::findOne($id);
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
        if ($model->delete()) {
            Msg::set('删除成功');
        }
        Msg::set('删除失败');
        return $this->redirect(['edit?id=' . $id]);
    }
}