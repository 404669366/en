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
        return $this->render('adminList');
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
}