<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/10/18
 * Time: 14:05
 */

namespace app\controllers\amend;

use app\controllers\basis\CommonController;
use vendor\en\EnAmendBase;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class AmendController extends CommonController
{
    /**
     * 用户列表页渲染
     * @return string
     */
    public function actionList()
    {
        $status = Constant::amendStatus();
        unset($status[4]);
        return $this->render('list', [
            'status' => $status, 'types' => Constant::amendType()
        ]);
    }

    /**
     * 用户列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnAmendBase::getPageData());
    }

    /**
     * 修改用户列表页数据
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnAmendBase::findOne($id);
        $status = Constant::amendStatus();
        unset($status[4]);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (!$model->contact_at) {
                $model->contact_at = time();
            }
            if ($model->load(['EnAmendBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model, 'status' => $status, 'types' => Constant::amendType()]);
    }

    /**
     * 删除用户列表页数据
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnAmendBase::findOne($id);
        $model->status = 4;
        if ($model->save()) {
            Msg::set('删除成功');
            return $this->redirect(['list']);
        }
        Msg::set('删除失败');
        return $this->redirect(['edit?id=' . $id]);
    }
}