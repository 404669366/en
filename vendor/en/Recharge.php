<?php

namespace vendor\en;

use vendor\helpers\Constant;
use vendor\helpers\Helper;
use vendor\helpers\Wechat;
use Yii;

/**
 * This is the model class for table "{{%recharge}}".
 *
 * @property string $id
 * @property string $user_id 用户ID
 * @property string $no 充值编号
 * @property string $money 充值金额
 * @property string $balance 余额
 * @property int $source 充值来源
 * @property string $created 创建时间
 */
class Recharge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%recharge}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['money'], 'required'],
            [['user_id', 'source', 'created'], 'integer'],
            [['money', 'balance', 'no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'money' => '充值金额',
            'balance' => '余额',
            'source' => '充值来源',
            'created' => '创建时间',
        ];
    }

    /**
     * 充值订单数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('r')
            ->leftJoin(User::tableName() . ' u', 'u.id = r.user_id')
            ->select(['u.tel', 'r.*'])
            ->page([
                'tel' => ['like', 'u.tel'],
                'source' => ['=', 'r.source'],
                'time' => ['=', "FROM_UNIXTIME(r.created, '%Y-%m-%d')"],
            ]);
        foreach ($data['data'] as &$v) {
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
            $v['source'] = Constant::getSource()[$v['source']];
        }
        return $data;
    }


    /**
     * 生成订单
     * @param string $money
     * @param string $balance
     * @param string $way
     * @return array
     */
    public static function wx($money = '', $balance = '', $way = '')
    {
        $model = new self();
        $model->no = Helper::createNo('O');
        $model->money = $money;
        $model->balance = $balance;
        $model->source = $way;
        $model->user_id = Yii::$app->user->id;
        $model->created = time();
        if ($model->save()) {
            $wx = Wechat::app()->getPayData($model->no, $money, $model->user_id);
            if ($wx) {
                return ['wx' => $wx, 'js' => Wechat::app()->getJsApiInfoByScan($wx['timestamp'], $wx['nonceStr'])];
            }
        }
        return [];
    }
}
