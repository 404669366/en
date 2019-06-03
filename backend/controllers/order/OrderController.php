<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/23
 * Time: 9:46
 */

namespace app\controllers\order;


use app\controllers\basis\CommonController;
use vendor\en\Electricize;
use vendor\en\Order;
use vendor\en\SectionRule;
use vendor\helpers\Constant;
use vendor\helpers\Helper;

class OrderController extends CommonController
{

    /**
     * 订单列表页面
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getOrderStatus()]);
    }

    /**
     * 订单列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Order::getPageData());
    }

    /**
     * 在线订单页面
     * @return string
     */
    public function actionOnline()
    {


        return $this->render('online');
    }

    /**
     * 在线订单数据
     * @return string
     */
    public function actionOnlineData()
    {

        $one = [114, 154];
        $ele = 0;
        for ($i = 0; $i < count($one); $i++) {
            $ele += $one[$i];
        }
        $no = 111111;
        $gun_no = 2;
        $info = SectionRule::getOrderMoney($no, $one);
        $time = 6325;
        $e = 22;
        $data['total'] = 1;
        $data['data'] = [['created' => date('Y-m-d H:i:s',time()), 'ele' => $ele, 'no' => $no, 'gun' => $gun_no, 'time' => $time, 'e' => $e,
            'electrovalence' => $info['electrovalence'], 'service' => $info['service'], 'o' => Helper::createNo('O'),
            'status' => Constant::getOrderOnlineStatus()[2], 'end' =>date('Y-m-d H:i:s',time()), 'begin' => date('Y-m-d H:i:s',time() - $time), 'user' => 111]];
        return $this->rTableData($data);
    }
}