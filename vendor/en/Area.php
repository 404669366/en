<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property string $area_id 地域id
 * @property string $area_name 地域名
 * @property string $full_name 地域全称
 * @property string $level 地域等级
 * @property string $parent_id 父地域id
 * @property string $province_id 省份ID
 * @property string $lat 纬度
 * @property string $lng 经度
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'level'], 'required'],
            [['level'], 'integer'],
            [['area_id', 'parent_id', 'province_id', 'lat', 'lng'], 'string', 'max' => 12],
            [['area_name'], 'string', 'max' => 100],
            [['full_name'], 'string', 'max' => 500],
            [['area_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'area_id' => '地域id',
            'area_name' => '地域名',
            'full_name' => '地域全称',
            'level' => '地域等级',
            'parent_id' => '父地域id',
            'province_id' => '省份ID',
            'lat' => '纬度',
            'lng' => '经度',
        ];
    }
}
