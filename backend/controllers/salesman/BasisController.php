<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 17:10
 */

namespace app\controllers\salesman;


use app\controllers\basis\CommonController;
use vendor\en\BasisField;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class BasisController extends CommonController
{
    /**
     * 业务员抢单
     * @return \yii\web\Response
     */
    public function actionRob()
    {
        BasisField::rob();
        return $this->redirect(['list']);
    }

    /**
     * 业务员接单列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'num' => BasisField::getNum(),
            'status' => Constant::getBasisStatus()
        ]);
    }

    /**
     *  业务员接单列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(BasisField::getPageData(\Yii::$app->user->id));
    }

    /**
     * 业务员详情页
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => BasisField::findOne($id),
            'status' => Constant::getBasisStatus()
        ]);
    }

    /**
     * 放弃基础场地
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionDel($id, $remark)
    {
        if ($remark) {
            $model = BasisField::findOne($id);
            Msg::set('基础场地不存在');
            if ($model) {
                $model->remark = $remark;
                $model->status = 3;
                if ($model->save()) {
                    Msg::set('放弃成功');
                } else {
                    Msg::set($model->errors());
                }
            }
            return $this->redirect(['list']);
        }
        Msg::set('请填写放弃原因');
        return $this->redirect(['detail?id=' . $id]);
    }

    /**
     * 添加真实场地
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAdd($id)
    {
        if ($data = BasisField::findOne($id)) {
            if (\Yii::$app->request->isPost) {
                $post = \Yii::$app->request->post();
                $model = new Field();
                $model->salesman_id = \Yii::$app->user->id;
                $model->type = 1;
                $model->created = time();
                if ($model->load(['Field' => $post]) && $model->validate() && $model->save()) {
                    Msg::set('场地发布成功，请等待初审');
                    $model = BasisField::findOne($id);
                    $model->status = 2;
                    if ($model->save()) {
                        return $this->redirect(['salesman/first/list']);
                    } else {
                        Msg::set($model->errors());
                    }
                } else {
                    Msg::set($model->errors());
                }

            }
            return $this->render('add', ['data' => $data]);
        }
        Msg::set('信息不存在');
        return $this->redirect(['list']);
    }
}
