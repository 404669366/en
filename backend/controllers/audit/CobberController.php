<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/3
 * Time: 21:51
 */

namespace app\controllers\audit;


use app\controllers\basis\CommonController;
use vendor\en\Ident;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class CobberController extends CommonController
{
    /**
     * 渲染合伙人审核列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['type' => Constant::getCobberType(), 'status' => Constant::getCobberStatus()]);
    }

    /**
     * 获取合伙人审核列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Ident::getPageData());
    }

    /**
     * 合伙人审核列表详情页数据
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        $model = Ident::findOne($id);
        return $this->render('detail', ['model' => $model, 'types' => Constant::getCobberType(), 'bank' => Constant::getBankType(), 'status' => Constant::getCobberStatus()]);
    }

    /**
     * 合伙人审核通过
     * @param $id
     * @return \yii\web\Response
     */
    public function actionPass($id)
    {
        Msg::set('非法操作');
        if ($model = Ident::findOne(['id' => $id, 'status' => [0, 3]])) {
            $model->type = $model->status == 0 ? 1 : 2;
            $model->status = $model->status == 0 ? 1 : 4;
            if ($model->save()) {
                Msg::set('审核通过');
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->redirect(['list']);
    }

    /**
     * 合伙人审核不通过
     * @param $id
     * @param $remark
     * @return \yii\web\Response
     */
    public function actionNoPass($id, $remark)
    {
        Msg::set('请填写备注');
        if ($remark) {
            Msg::set('非法操作');
            if ($model = Ident::findOne(['id' => $id, 'status' => [0, 3]])) {
                $model->status = $model->status == 0 ? 2 : 5;
                $model->remark = $remark;
                if ($model->save()) {
                    Msg::set('保存成功');
                } else {
                    Msg::set($model->errors());
                }
            }
            return $this->redirect(['list']);
        }
        return $this->redirect(['detail?id=' . $id]);
    }
}