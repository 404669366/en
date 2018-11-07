<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/10/30
 * Time: 15:28
 */

namespace app\controllers\content;


use app\controllers\basis\CommonController;
use vendor\en\EnArticleBase;
use vendor\helpers\Msg;

class ArticleController extends CommonController
{
    /**
     * 文章列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 文章列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnArticleBase::getPageData());
    }


    /**
     * 新增文章列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        return $this->render('add');
    }


    /**
     * 修改文章列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnArticleBase::findOne($id);
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 保存文章配置
     * @return string
     */
    public function actionSave()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['id']) && $post['id']) {
                $model = EnArticleBase::findOne($post['id']);
                $model->modified = time();
            } else {
                $model = new EnArticleBase();
                $model->created = time();
                $model->modified = time();
            }
            if ($model->load(['EnArticleBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->rJson();
            }
            return $this->rJson([], false, $model->errors());
        }
        return $this->rJson([], false, '请求错误');
    }


    /**
     * 删除文章列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnArticleBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}