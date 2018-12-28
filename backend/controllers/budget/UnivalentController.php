<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/28
 * Time: 15:38
 */

namespace app\controllers\budget;


use app\controllers\basis\CommonController;
use vendor\en\Univalent;
use vendor\helpers\Msg;

class UnivalentController extends CommonController
{
    public function actionList()
    {
        return $this->render('list', ['min' => Univalent::getMin()]);
    }

    public function actionData()
    {
        return $this->rTableData(Univalent::getPageData());
    }

    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $model = new Univalent();
            $data = \Yii::$app->request->post();
            if ($model->load(['Univalent' => $data]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->redirect(['list']);
    }

    public function actionDel($id)
    {
        if ($model = Univalent::find()->select(['max(max)'])->one()) {
            Msg::set('请先从末尾范围开始删除');
            if ($model->id == $id) {
                $model = Univalent::findOne($id);
                $model->delete();
                Msg::set('删除成功');
            }
        }
        return $this->redirect(['list']);
    }
}