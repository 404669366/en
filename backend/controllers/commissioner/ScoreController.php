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
use vendor\en\User;
use vendor\helpers\Constant;
use vendor\helpers\Helper;
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
    public function actionDetail($id)
    {
        if ($model = Field::findOne(['id' => $id, 'member_id' => \Yii::$app->user->id, 'status' => [0, 1, 2]])) {
            if ($model->status == 1 && \Yii::$app->request->isPost) {
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
            return $this->render('detail', [
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
            return $this->redirect(['detail?id=' . $id]);
        }
        Msg::set('场地不存在');
        return $this->redirect(['list']);
    }

    /**
     * 专员发布场地
     * @return string
     */
    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            $model = new Field();
            $model->member_id = \Yii::$app->user->id;
            $model->type = 1;
            $model->created = time();
            $model->no = Helper::createNo('F');
            if ($model->load(['Field' => $post]) && $model->validate() && $model->save()) {
                Msg::set('场地发布成功，请等待评分结果');
                return $this->redirect(['list']);
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->render('add');
    }

    /**
     * 搜索场地方
     * @param string $tel
     * @return string
     */
    public function actionSearch($tel = '')
    {
        $data = User::find()->where(['like', 'tel', $tel])
            ->asArray()->all();
        return $this->rJson($data);
    }
}