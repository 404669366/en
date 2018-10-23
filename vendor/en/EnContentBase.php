<?php

namespace vendor\en;

use Yii;

/**
 * This is the model class for table "en_content".
 *
 * @property int $id
 * @property string $no 标识
 * @property string $content 文本内容
 * @property string $user 修改用户
 * @property string $created_at 创建时间
 *
 */
class EnContentBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_content';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'note','user'], 'string'],
            [['no'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no' => '标识',
            'content' => '文本内容',
            'note' => '备注',
            'user' => '修改用户',
            'created_at' => '创建时间',
        ];
    }
    public static function getPageData()
    {
        $data = self::find()
            ->where()
            ->page([
                'no' => ['like', 'no'],
                'user' => ['like', 'user'],
            ]);
        return $data;
    }
}
