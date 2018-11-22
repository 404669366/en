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

class FourthController extends CommonController
{
    /**
     * 四审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [

            'status' => Constant::getFieldStatus()]);
    }

    /**
     * 四审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([0, 1, 2]));
    }

    /**
     * 四审详情列表
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render(
            'detail', ['model' => Field::findOne($id),
            'status' => Constant::getFieldStatus(),
            'types' => Constant::getFieldType(),
            'members' => Member::getMemberByJob(4)
        ]);
    }

    /**
     * 四审通过
     * @param $id
     * @return \yii\web\Response
     */
    public function actionPass($id)
    {
        $model = Field::findOne($id);
        $model->status = 1;
        if ($model->save()) {
            return $this->redirect('list');

        }
    }

    /**
     * 四审不通过
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionNoPass($id, $remark)
    {
        if ($remark) {
            $model = Field::findOne($id);
            Msg::set('真实场地不存在');
            if ($model) {
                $model->remark = $remark;
                $model->status = 2;
                if ($model->save()) {
                    Msg::set('一审不通过');
                } else {
                    Msg::set($model->errors());
                }
            }
            return $this->redirect(['list']);
        }
        Msg::set('请填写不通过原因');
        return $this->redirect(['detail?id=' . $id]);
    }
}