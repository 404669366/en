<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property string $id
 * @property string $name 菜单名
 * @property string $url 路由
 * @property string $sort 排序
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '菜单名',
            'url' => '路由',
            'sort' => '排序',
        ];
    }
}
