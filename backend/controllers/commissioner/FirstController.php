<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/23
 * Time: 11:39
 */

namespace app\controllers\commissioner;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class FirstController extends CommonController
{
    /**
     * 一审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::getFieldStatus([4, 5, 6])
        ]);
    }

    /**
     * 一审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([4, 5, 6], \Yii::$app->user->id, 1));
    }

    /**
     * 一审列表详情
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        $model = Field::findOne(['id' => $id, 'member_id' => \Yii::$app->user->id, 'status' => [4, 5, 6]]);
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Field' => $data]) && $model->validate()) {
                $model->status = 4;
                if ($model->save()) {
                    Msg::set('提交成功');
                    return $this->redirect(['list']);
                }
            }
            Msg::set($model->errors());
        }
        return $this->render('detail', ['model' => $model, 'status' => Constant::getFieldStatus()]);
    }

    /**
     * 放弃操作
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionDel($id, $remark)
    {
        if ($model = Field::findOne(['id' => $id, 'status' => 6, 'member_id' => \Yii::$app->user->id])) {
            $model->status = 7;
            $model->remark = $remark;
            if ($model->save()) {
                Msg::set('放弃成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
            return $this->redirect(['detail?id=' . $id]);
        }
        Msg::set('场地不存在');
        return $this->redirect(['list']);
    }

}