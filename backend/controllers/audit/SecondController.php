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

class SecondController extends CommonController
{
    /**
     * 二审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus([14, 15, 16])]);
    }

    /**
     * 二审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([14, 15, 16], 0, false));
    }

    /**
     * 二审详情列表
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
     * 二审审核通过
     * @param $id
     * @return \yii\web\Response
     */
    public function actionPass($id)
    {
        Msg::set('真实场地不存在');
        if ($model = Field::findOne(['id' => $id, 'status' => 14])) {
            $model->status = 15;
            if ($model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->redirect(['detail?id=' . $id]);
    }

    /**
     * 二审审核不通过
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionNoPass($id, $remark)
    {
        Msg::set('真实场地不存在');
        if ($model = Field::findOne(['id' => $id, 'status' => 14])) {
            $model->status = 16;
            $model->remark = $remark;
            if ($model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            return $this->redirect(['list?id=' . $id]);
        }
    }
}