<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/28
 * Time: 15:17
 */

namespace app\controllers\budget;


use app\controllers\basis\CommonController;
use vendor\en\Transformer;
use vendor\helpers\Msg;

class TransformerController extends CommonController
{
    public function actionList()
    {
        return $this->render('list', ['min' => Transformer::getMin()]);
    }

    public function actionData()
    {
        return $this->rTableData(Transformer::getPageData());
    }

    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Transformer();
            $data = \Yii::$app->request->post();
            if ($model->load(['Transformer' => $data]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->redirect(['list']);
    }

    public function actionDel($id)
    {
        if ($model = Transformer::find()->select(['max(max)'])->one()) {
            Msg::set('请先从末尾范围开始删除');
            if ($model->id == $id) {
                $model = Transformer::findOne($id);
                $model->delete();
                Msg::set('删除成功');
            }
        }
        return $this->redirect(['list']);
    }
}