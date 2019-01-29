<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/19
 * Time: 18:42
 */

namespace app\controllers\agency;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class RecordController extends CommonController
{
    /**
     * 备案列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus([5, 8, 9]), 'type' => Constant::getFieldType()]);
    }

    /**
     * 备案列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([5, 8, 9], 0, false));
    }

    /**
     * 备案详情列表
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDetail($id)
    {
        $model = Field::findOne(['id' => $id, 'status' => [5, 8, 9]]);
        if (in_array($model->status, [5, 9]) && \Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Field' => $data]) && $model->validate()) {
                $model->status = 8;
                if ($model->save()) {
                    Msg::set('提交成功');
                    return $this->redirect(['list']);
                }
                Msg::set($model->errors());
            }
        }
        return $this->render('detail', ['model' => $model, 'status' => Constant::getFieldStatus(), 'types' => Constant::getFieldType()]);
    }

    /**
     * 备案失败
     * @param $id
     * @param $remark
     * @return string|\yii\web\Response
     */
    public function actionDel($id, $remark)
    {
        $model = Field::findOne(['id' => $id, 'status' => [5, 9]]);
        if (in_array($model->status, [5, 9])) {
            $data = \Yii::$app->request->get();
            if ($model->load(['Field' => $data]) && $model->validate()) {
                $model->status = 9;
                $model->remark = $remark;
                if ($model->save()) {
                    Msg::set('提交成功');
                    return $this->redirect(['list']);
                }
            }
            Msg::set($model->errors());
        }
        return $this->render('detail', ['model' => $model, 'status' => Constant::getFieldStatus(), 'types' => Constant::getFieldType()]);
    }
}