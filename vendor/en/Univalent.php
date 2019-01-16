<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "univalent".
 *
 * @property int $id
 * @property string $min 功率最小值
 * @property string $max 功率最大值
 * @property string $price 范围单价(kw)
 */
class Univalent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'univalent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'min', 'max'], 'required'],
            [['price', 'min', 'max'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'min' => '功率最小值',
            'max' => '功率最大值',
            'price' => '范围单价(kw)',
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
     * 获取功率最小值
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
