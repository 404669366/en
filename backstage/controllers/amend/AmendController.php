<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/10/18
 * Time: 14:05
 */

namespace app\controllers\amend;

use app\controllers\basis\CommonController;
use vendor\en\EnAmendBase;
use vendor\helpers\Constant;

class AmendController extends CommonController
{
    /**
     * 用户列表页渲染
     * @return string
     */
    public function actionList()
    {
        $status = Constant::amendStatus();
        unset($status[4]);
        return $this->render('list', [
            'status' => $status, 'types' => Constant::amendType()
        ]);
    }

    /**
     * 用户列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnAmendBase::getPageData());
    }

    public function actionEdit(){
        return $this->render('edit');
    }
}