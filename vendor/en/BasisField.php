<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%basis_field}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $area_id 地域ID
 * @property string $member_id 后台用户ID
 * @property string $name 场地人姓名
 * @property string $address 场地位置
 * @property string $intro 场地信息介绍
 * @property string $remark 审核备注
 * @property string $status 场地状态1审核通过2审核不通过
 * @property string $image 场地图片
 * @property string $created 创建时间
 * @property string $updated 更新时间
 */
class BasisField extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%basis_field}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'area_id', 'member_id', 'status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['address', 'remark', 'created', 'updated'], 'string', 'max' => 255],
            [['intro'], 'string', 'max' => 500],
            [['image'], 'string', 'max' => 1000],
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
            'name' => '场地人姓名',
            'address' => '场地位置',
            'intro' => '场地信息介绍',
            'remark' => '审核备注',
            'status' => '场地状态1审核通过2审核不通过',
            'image' => '场地图片',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }
}
