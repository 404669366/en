<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "en_power".
 *
 * @property string $id
 * @property string $no 权限标识
 * @property int $type 权限类型 1菜单2按钮3接口
 * @property string $name 权限名
 * @property string $url 权限路由
 */
class EnPowerBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_power';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'integer'],
            [['no'], 'string', 'max' => 8],
            [['name'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '权限标识',
            'type' => '权限类型 1菜单2按钮3接口',
            'name' => '权限名',
            'url' => '权限路由',
        ];
    }
}
