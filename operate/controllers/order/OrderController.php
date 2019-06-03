<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/29
 * Time: 17:19
 */

namespace app\controllers\order;


use app\controllers\basis\CommonController;
use vendor\en\Order;
use vendor\en\Recharge;
use vendor\helpers\redis;

class OrderController extends CommonController
{

    /**
     * 获取订单数据
     * @return string+
     */
    public function actionOrder()
    {
        if ($user_id = \Yii::$app->user->id) {
            $dataOne = redis::app()->getPageData('', '', '', '');
            $dataTwo = Order::getData($user_id);
            return $this->render('order', ['dataOne' => $dataOne, 'dataTwo' => $dataTwo]);
        }
    }

    /**
     * 订单详情页面
     * @param int $id
     * @param string $no
     * @return string
     */
    public function actionDetail($id=0,$no='')
    {
        $data = redis::app()->hGet('',$no);
        $model = Order::findOne(['id' => $id]);
        return $this->render('detail', ['model' => $model,'data'=>$data]);
    }

    /**
     * 微信充值操作
     */
    public function actionWx()
    {
        $re = Recharge::wx($_GET['money'],$_GET['balance'],$_GET['way']);
        if ($re) {
            return $this->rJson($re);
        }
        return $this->rJson([], false);
    }
}