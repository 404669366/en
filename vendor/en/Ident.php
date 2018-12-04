<?php

namespace vendor\en;

use vendor\helpers\Constant;
use Yii;

/**
 * This is the model class for table "ident".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $name 真实姓名
 * @property string $area_id 地域ID
 * @property string $address 联系地址
 * @property string $remark 备注
 * @property string $card_positive 身份证正面
 * @property string $card_opposite 身份证反面
 * @property string $bank_type 银行类型
 * @property string $bank_no 银行卡号
 * @property string $money_ident 打款凭证
 * @property int $type 合伙人类型 0普通合伙人1正式合伙人
 * @property int $status 状态
 * @property string $created 创建时间
 */
class Ident extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ident';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'area_id', 'bank_type', 'type', 'status', 'created'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['address', 'remark'], 'string', 'max' => 255],
            [['card_positive', 'card_opposite', 'money_ident'], 'string', 'max' => 500],
            [['bank_no'], 'string', 'max' => 30],
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
            'name' => '真实姓名',
            'area_id' => '地域ID',
            'address' => '联系地址',
            'card_positive' => '身份证正面',
            'card_opposite' => '身份证反面',
            'bank_type' => '银行类型',
            'bank_no' => '银行卡号',
            'money_ident' => '打款凭证',
            'remark' => '备注',
            'type' => '合伙人类型 0普通合伙人1正式合伙人',
            'status' => '状态',
            'created' => '创建时间',
        ];
    }

    /**
     * 关联普通用户表
     * @return \yii\db\ActiveQuery
     */
    public function getCobber()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * 关联地域表
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Area::class, ['area_id' => 'area_id']);
    }

    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('i')
            ->leftJoin(Area::tableName() . ' a', 'a.area_id=i.area_id')
            ->leftJoin(User::tableName() . ' u', 'u.id=i.user_id')
            ->select(['i.*', 'u.tel', 'a.full_name'])->page([
                'name' => ['like', 'i.name'],
                'full_name' => ['like', 'a.full_name'],
                'type' => ['=', 'i.type'],
                'status' => ['=', 'i.status'],
                'tel' => ['=', 'u.tel'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['type'] = Constant::getCobberType()[$v['type']];
            $v['status'] = Constant::getCobberStatus()[$v['status']];
            $v['created'] = date('Y-m-d H:i:s', $v['created']);
        }
        return $data;
    }
}
