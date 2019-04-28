<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "{{%section_type}}".
 *
 * @property int $id
 * @property string $name 类型名称
 * @property string $intro 类型说明
 * @property int $created 创建时间
 */
class SectionType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section_type}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
            [['intro'], 'string', 'max' => 255],
            [['intro', 'name'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '类型名称',
            'intro' => '类型说明',
            'created' => '创建时间',
        ];
    }
    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()
            ->page([
                'name' => ['like', 'name'],
            ]);
        return $data;
    }
}
