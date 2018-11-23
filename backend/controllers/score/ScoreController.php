<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/22
 * Time: 16:22
 */

namespace app\controllers\score;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\en\Score;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class ScoreController extends CommonController
{
    /**
     * 评分场地列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::getFieldStatus(),
            'type' => Constant::getFieldType()
        ]);
    }

    /**
     * 评分场地列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getScorePageData());
    }

    /**
     * 评分详情页
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => Field::findOne($id),
            'score' => Score::findOne(['field_id' => $id, 'member_id' => \Yii::$app->user->id]),
            'status' => Constant::getFieldStatus()
        ]);
    }

    /**
     * 评分操作
     * @return \yii\web\Response
     */
    public function actionScore()
    {
        $data = \Yii::$app->request->get();
        $model = new Score();
        $model->created = time();
        $model->member_id = \Yii::$app->user->id;
        if ($model->load(['Score' => $data]) && $model->validate() && $model->save()) {
            $model->scoreDo();
            Msg::set('评分成功');
            return $this->redirect(['list']);
        }
        Msg::set($model->errors());
        return $this->redirect(['detail?id=' . $data['field_id']]);
    }
}