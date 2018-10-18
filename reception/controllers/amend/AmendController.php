<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/10/18
 * Time: 9:04
 */

namespace app\controllers\amend;

use app\controllers\basis\BasisController;
use vendor\en\EnAmendBase;
use vendor\helpers\Helper;

class AmendController extends BasisController
{
    /**
     * 保存需求
     * @return string
     */
    public function actionSave()
    {
        $data = \Yii::$app->request->get();
        if (isset($data['tel']) && Helper::validateTel($data['tel'])) {
            $model = new EnAmendBase();
            $data['created_at'] = time();
            if ($model->load(['EnAmendBase' => $data]) && $model->validate() && $model->save()) {
                return $this->rJson();
            }
            return $this->rJson('', false, $model->errors());
        }
        return $this->rJson('', false, '手机号错误');
    }
}