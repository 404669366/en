<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "ident".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $area_id 地域ID
 * @property string $address 联系地址
 * @property string $card_positive 身份证正面
 * @property string $card_opposite 身份证反面
 * @property string $money_ident 打款凭证
 * @property int $type 合伙人类型 0普通合伙人1付费合伙人
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
            [['user_id', 'area_id', 'type', 'status', 'created'], 'integer'],
            [['address'], 'string', 'max' => 255],
            [['card_positive', 'card_opposite', 'money_ident'], 'string', 'max' => 500],
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
            'area_id' => '地域ID',
            'address' => '联系地址',
            'card_positive' => '身份证正面',
            'card_opposite' => '身份证反面',
            'money_ident' => '打款凭证',
            'type' => '合伙人类型 0普通合伙人1付费合伙人',
            'status' => '状态',
            'created' => '创建时间',
        ];
    }
}
