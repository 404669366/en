<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/1
 * Time: 17:20
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\Field;

class CobberController extends CommonController
{
    /**
     * 合伙人抢单
     * @return string
     */
    public function actionRob()
    {
        $re = Field::rob();
        if ($re == '抢单成功') {
            return $this->rJson([], true, $re);
        }
        return $this->rJson([], false, $re);
    }
}