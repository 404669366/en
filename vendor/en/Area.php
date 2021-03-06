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

    /**
     * 返回地域数据
     * @param int $parent_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getData($parent_id = 0)
    {
        $data = self::find();
        if ($parent_id) {
            $data->where(['parent_id' => $parent_id]);
        } else {
            $data->where(['level' => 1]);
        }
        return $data->select(['area_id', 'area_name'])->asArray()->all();
    }

    /**
     * 返回默认参数
     * @param int $area_id
     * @return array
     */
    public static function getDef($area_id = 0)
    {
        $data = ['county' => 0, 'city' => 0, 'province' => 0];
        if ($now = self::findOne(['area_id' => $area_id, 'level' => 3])) {
            $data['county'] = $area_id;
            $data['city'] = $now->parent_id;
            $data['province'] = $now->province_id;
        }
        return $data;
    }
}
