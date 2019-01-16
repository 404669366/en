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
            [['price', 'min', 'max', 'name', 'power',], 'required'],
            [['price', 'min', 'max'], 'number'],
            [['name', 'power',], 'string', 'max' => 50],
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

    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()->page();
    }

    /**
     * 获取适配最小值
     * @return int|mixed
     */
    public static function getMin()
    {
        $data = self::find()->select(['max(max) as min'])->asArray()->one();
        if ($data && $data['min']) {
            return $data['min'];
        }
        return 0;
    }
}
