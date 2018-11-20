<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%ident}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property int $area_id 地域ID
 * @property string $member_id 后台用户ID
 * @property int $card 身份证号码
 * @property string $address 场地位置
 * @property string $status 状态1初审中2初审通过3初审不通过4二审中5二审通过6二审不通过7备案成功8备案失败9资料有误10三审中11三审通过12三审不通过13四审中14四审通过15四审不通过
 * @property string $created 创建时间
 * @property string $updated 更新时间
 */
class Ident extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ident}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'area_id', 'member_id', 'card', 'status'], 'integer'],
            [['address', 'created', 'updated'], 'string', 'max' => 255],
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
            'member_id' => '后台用户ID',
            'card' => '身份证号码',
            'address' => '场地位置',
            'status' => '状态1初审中2初审通过3初审不通过4二审中5二审通过6二审不通过7备案成功8备案失败9资料有误10三审中11三审通过12三审不通过13四审中14四审通过15四审不通过',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }
}
