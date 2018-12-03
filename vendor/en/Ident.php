<?php

namespace vendor\en;

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
            [['address','remark'], 'string', 'max' => 255],
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
}
