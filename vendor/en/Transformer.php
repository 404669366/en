<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "transformer".
 *
 * @property int $id
 * @property string $name 变压器名称
 * @property string $power 变压器功率
 * @property string $min 适配功率最小值
 * @property string $max 适配功率最大值
 * @property string $price 价格
 */
class Transformer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transformer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['name', 'power', 'min', 'max'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '变压器名称',
            'power' => '变压器功率',
            'min' => '适配功率最小值',
            'max' => '适配功率最大值',
            'price' => '价格',
        ];
    }
}
