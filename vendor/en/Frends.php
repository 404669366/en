<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "frends".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $image 图片
 * @property string $url 路由
 * @property string $sort 排序
 */
class Frends extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'frends';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['image', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'image' => '图片',
            'url' => '路由',
            'sort' => '排序',
        ];
    }
}
