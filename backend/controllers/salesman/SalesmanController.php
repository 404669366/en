<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/19
 * Time: 17:10
 */

namespace app\controllers\salesman;


use app\controllers\basis\CommonController;
use vendor\en\Area;
use vendor\en\BasisField;
use vendor\en\Field;
use vendor\en\Member;
use vendor\en\User;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class SalesmanController extends CommonController
{
    /**
     * 业务员接单列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     *  业务员接单列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(BasisField::getPageData());
    }

    /**
     * 管理员列表
     * @return string
     */
    public function actionAdminList()
    {
        return $this->render('adminList', ['status' => Constant::basisStatus()]);
    }

    /**
     *  管理员列表列表数据
     * @return string
     */
    public function actionAdminData()
    {
        return $this->rTableData(BasisField::getAdminPageData());
    }


    /**
     * 放弃导航栏
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = BasisField::findOne($id);
        Msg::set('放弃失败');
        if ($model) {
            $model->status = 4;
            if ($model->save()) {
                Msg::set('放弃成功');
            }
        }
        return $this->redirect(['list']);
    }

    /**
     * 添加真实场地
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionAddField($id)
    {
        if ($data = BasisField::findOne($id)) {
            if (\Yii::$app->request->isPost) {
                $post = \Yii::$app->request->post();
                $model = new Field();
                if ($model->load(['Field' => $post]) && $model->validate() && $model->save()) {
                    Msg::set('场地发布成功，请等待初审');
                    return $this->redirect(['audit/first/my-list']);
                } else {
                    Msg::set($model->errors());
                }
            }
            return $this->render('add', ['data' => $data]);
        }
        Msg::set('信息不存在');
        return $this->render('list');

    }

    public function actionDetail($id)
    {
        return $this->render('detail', [
            'model' => BasisField::findOne($id),
            'status' => Constant::basisStatus()
        ]);
    }

    public function actionEdit($id)
    {
        return $this->render('edit', [
            'model' => BasisField::findOne($id),
            'status' => Constant::basisStatus()
        ]);
    }

    public function actionRecover($id, $mid)
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
        return $this->redirect(['admin-list']);
    }
}
