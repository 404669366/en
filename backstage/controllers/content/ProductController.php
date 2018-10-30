<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/10/30
 * Time: 15:28
 */

namespace app\controllers\content;


use app\controllers\basis\CommonController;
use vendor\en\EnProductBase;
use vendor\helpers\Msg;

class ProductController extends CommonController
{
    /**
     * 产品列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 产品列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnProductBase::getPageData());
    }


    /**
     * 新增产品列表页数据
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        return $this->render('add');
    }


    /**
     * 修改产品列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnProductBase::findOne($id);
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 保存产品配置
     * @return string
     */
    public function actionSave()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['id']) && $post['id']) {
                $model = EnProductBase::findOne($post['id']);
            } else {
                $model = new EnProductBase();
            }
            if ($model->load(['EnProductBase' => $post]) && $model->validate() && $model->save()) {
                $model->updateProduct();
                Msg::set('保存成功');
                return $this->rJson();
            }
            return $this->rJson([], false, $model->errors());
        }
        return $this->rJson([], false, '请求错误');
    }


    /**
     * 删除产品列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnProductBase::findOne($id);
        Msg::set('删除失败');
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateProduct($id);
        }
        return $this->redirect(['list']);
    }
}