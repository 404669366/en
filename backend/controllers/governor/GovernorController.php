<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/21
 * Time: 13:43
 */

namespace app\controllers\governor;


use app\controllers\basis\CommonController;
use vendor\en\BasisField;
use vendor\en\Field;
use vendor\en\Member;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class GovernorController extends CommonController
{
    /**
     * 主管基础场地列表
     * @return string
     */
    public function actionBasisList()
    {
        return $this->render('basis-list', ['status' => Constant::getBasisStatus()]);
    }

    /**
     *  主管基础场地列表数据
     * @return string
     */
    public function actionBasisData()
    {
        return $this->rTableData(BasisField::getPageData());
    }

    /**
     * 主管基础场地详情页
     * @param $id
     * @return string
     */
    public function actionBasisDetail($id)
    {
        return $this->render('basis-detail', [
            'model' => BasisField::findOne($id),
            'status' => Constant::getBasisStatus(),
            'members' => Member::getMemberByJob(4)
        ]);
    }

    /**
     * 恢复基础场地
     * @param $id
     * @param $mid
     * @return \yii\web\Response
     */
    public function actionBasisRecover($id, $mid)
    {
        Msg::set('基础场地不存在');
        if ($model = BasisField::findOne(['id' => $id, 'status' => 3])) {
            $model->member_id = $mid;
            $model->status = 1;
            $model->updated = time();
            if ($model->save()) {
                Msg::set('基础场地恢复成功');
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->redirect(['basis-list']);
    }

    /**
     * 主管真实场地列表
     * @return string
     */
    public function actionFieldList()
    {
        return $this->render('field-list', [
            'status' => Constant::getFieldStatus(),
            'type' => Constant::getFieldType()
        ]);
    }

    /**
     *  主管真实场地列表数据
     * @return string
     */
    public function actionFieldData()
    {
        return $this->rTableData(Field::getPageData([], 0, false));
    }

    /**
     * 主管真实场地详情页
     * @param $id
     * @return string
     */
    public function actionFieldDetail($id)
    {
        return $this->render('field-detail', [
            'model' => Field::findOne($id),
            'status' => Constant::getFieldStatus(),
            'members' => Member::getMemberByJob(4)
        ]);
    }
}