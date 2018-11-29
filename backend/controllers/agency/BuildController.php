<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/19
 * Time: 18:41
 */

namespace app\controllers\agency;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class BuildController extends CommonController
{
    /**
     * 建设图和造价列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus([7, 10, 11]), 'type' => Constant::getFieldType()]);
    }

    /**
     * 建设图和造价列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([7, 10, 11], 0, false));
    }

    /**
     * 建设图和造价列表详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDetail($id)
    {
        $model = Field::findOne(['id' => $id, 'status' => [7, 10, 11]]);
        if ($model->status == 7 && \Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Field' => $data]) && $model->validate()) {
                $model->status = 10;
                if ($model->save()) {
                    Msg::set('提交成功');
                    return $this->redirect('list');
                }
                Msg::set($model->errors());
            }
        }
        return $this->render('detail', ['model' => $model, 'status' => Constant::getFieldStatus(), 'types' => Constant::getFieldType()]);
    }

    /**
     * 建设图和造价有误
     * @param $id
     * @param $remark
     * @return string|\yii\web\Response
     */
    public function actionDel($id, $remark)
    {
        $model = Field::findOne(['id' => $id, 'status' => [7, 10, 11]]);
        if (in_array($model->status, [7, 11])) {
            $data = \Yii::$app->request->get();
            if ($model->load(['Field' => $data]) && $model->validate()) {
                $model->status = 11;
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