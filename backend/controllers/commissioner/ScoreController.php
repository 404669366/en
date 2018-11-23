<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\commissioner;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class ScoreController extends CommonController
{
    /**
     * 专员评分列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::getFieldStatus(),
        ]);
    }

    /**
     *  专员评分列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([0, 1, 2], \Yii::$app->user->id, 1));
    }

    /**
     * 提交一审
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionNext($id)
    {
        if ($model = Field::findOne(['id' => $id, 'member_id' => \Yii::$app->user->id, 'status' => 1])) {
            if (\Yii::$app->request->isPost) {
                $data = \Yii::$app->request->post();
                if ($model->load(['Field' => $data]) && $model->validate()) {
                    $model->status = 4;
                    if ($model->save()) {
                        Msg::set('提交成功,请等待一审');
                        return $this->redirect(['commissioner/first/list']);
                    }
                    Msg::set($model->errors());
                }
            }
            return $this->render('next', [
                'model' => $model,
                'status' => Constant::getFieldStatus()
            ]);
        }
        Msg::set('场地不存在');
        return $this->redirect(['list']);
    }

    /**
     * 放弃操作
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionDel($id, $remark)
    {
        if ($model = Field::findOne(['id' => $id, 'status' => 1, 'member_id' => \Yii::$app->user->id])) {
            $model->status = 3;
            $model->remark = $remark;
            if ($model->save()) {
                Msg::set('放弃成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
            return $this->redirect(['next?id='. $id]);
        }
        Msg::set('场地不存在');
        return $this->redirect(['list']);
    }
}