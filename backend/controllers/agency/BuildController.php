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
        return $this->render('list', ['status' => Constant::getFieldStatus([8, 10, 11, 12]), 'type' => Constant::getFieldType()]);
    }

    /**
     * 建设图和造价列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([8, 10, 11, 12], 0, false));
    }

    /**
     * 建设图和造价列表详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDetail($id)
    {
        $model = Field::findOne(['id' => $id, 'status' => [8, 10, 11, 12]]);
        if (in_array($model->status, [8, 12]) && \Yii::$app->request->isPost) {
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
}