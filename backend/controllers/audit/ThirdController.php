<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 16:21
 */

namespace app\controllers\audit;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\en\Member;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class ThirdController extends CommonController
{
    /**
     * 一审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus([18, 19, 20])]);
    }

    /**
     * 一审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([18, 19, 20], 0, false));
    }

    /**
     * 一审详情列表
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render(
            'detail', ['model' => Field::findOne($id),
            'status' => Constant::getFieldStatus(),
            'types' => Constant::getFieldType(),
        ]);
    }

    /**
     * 三审通过
     * @param $id
     * @return \yii\web\Response
     */
    public function actionPass($id)
    {
        Msg::set('真实场地不存在');
        if ($model = Field::findOne(['id' => $id, 'status' => 18])) {
            $model->status = 19;
            if ($model->save()) {
                Msg::set('保存成功');
                return $this->redirect('list');
            }
            Msg::set($model->errors());
            return $this->redirect(['detail?id=' . $id]);
        }
    }

    /**
     * 三审不通过
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionNoPass($id, $remark)
    {
        Msg::set('真实场地不存在');
        if ($model = Field::findOne(['id' => $id, 'status' => 18])) {
            $model->status = 20;
            if ($model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
            return $this->redirect('detail?id=' . $id);
        }
    }
}