<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/5
 * Time: 15:18
 */

namespace app\controllers\budget;


use app\controllers\basis\BasisController;
use vendor\en\EnProductBase;
use vendor\helpers\Sms;

class BudgetController extends BasisController
{
    /**
     * 预测电桩收益
     * @param $data
     * @param $tel
     * @param $code
     * @return string
     */
    public function actionBudget($data, $tel, $code)
    {
        if (Sms::validateCode($tel, $code)) {
            if ($re = EnProductBase::budget(json_decode($data, true))) {
                return $this->rJson($re);
            }
            return $this->rJson('', false, '获取预测信息失败');
        }
        return $this->rJson('', false, '短信验证码错误');
    }
}