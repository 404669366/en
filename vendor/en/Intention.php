<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%intention}}".
 *
 * @property int $id
 * @property string $user_id 场地方ID
 * @property int $field_id 场地ID
 * @property string $money 预购金额
 * @property string $contract_photo 投资合同
 * @property string $ratio 分成比例
 * @property string $created 创建时间
 */
class Intention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%intention}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'field_id'], 'integer'],
            [['money', 'ratio', 'created'], 'string', 'max' => 255],
            [['contract_photo'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '场地方ID',
            'field_id' => '场地ID',
            'money' => '预购金额',
            'contract_photo' => '投资合同',
            'ratio' => '分成比例',
            'created' => '创建时间',
        ];
    }
}
