<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property string $id
 * @property string $name 等级名称
 * @property string $max 最大值
 * @property string $min 最小值
 * @property string $royalty 提成金额
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['max', 'min'], 'integer'],
            [['name', 'royalty'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '等级名称',
            'max' => '最大值',
            'min' => '最小值',
            'royalty' => '提成金额',
        ];
    }
}
