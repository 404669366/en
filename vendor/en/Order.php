<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property string $no 订单编号
 * @property string $electricize_no 电桩编号
 * @property string $user_id 用户ID
 * @property string $gun_no 枪口号
 * @property string $begin_at 开始时间
 * @property string $end_at 结束时间
 * @property string $all_elec 总充电量
 * @property string $all_price 充电总金额
 * @property string $all_service 充电总服务费
 * @property int $status 订单状态
 * @property string $created 创建时间
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'gun_no', 'begin_at', 'end_at', 'status', 'created'], 'integer'],
            [['no', 'electricize_no', 'user_id', 'gun_no', 'begin_at', 'end_at', 'status', 'all_elec', 'all_price', 'all_service'], 'required'],
            [['no', 'electricize_no'], 'string', 'max' => 20],
            [['all_elec', 'all_price', 'all_service'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '订单编号',
            'electricize_no' => '电桩编号',
            'user_id' => '用户ID',
            'gun_no' => '枪口号',
            'begin_at' => '开始时间',
            'end_at' => '结束时间',
            'all_elec' => '总充电量',
            'all_price' => '充电总金额',
            'all_service' => '充电总服务费',
            'status' => '订单状态',
            'created' => '创建时间',
        ];
    }


    /**
     * 获取订单数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('o')
            ->leftJoin(User::tableName() . ' u', 'o.user_id = u.id ')
            ->select(['o.*', 'u.tel'])
            ->page([
                'no' => ['=', 'no'],
                'electricize_no' => ['=', 'electricize_no'],
                'status' => ['=', 'status'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['status'] = Constant::getOrderStatus()[$v['status']];
            $v['begin_at'] = date('Y-m-d H:i:s',$v['begin_at']);
            $v['end_at'] = date('Y-m-d H:i:s',$v['end_at']);
            $v['created'] = date('Y-m-d H:i:s',$v['created']);
        }
        return $data;
    }
}
