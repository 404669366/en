<?php

namespace vendor\en;

use vendor\helpers\redis;
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
            [['content', 'no', 'note'], 'required'],
            [['content', 'note'], 'string'],
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

    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->alias('c')
            ->leftJoin(EnMemberBase::tableName() . ' m', 'c.user=m.id')
            ->select(['c.*', 'm.username'])
            ->page([
                'no' => ['like', 'no'],
                'user' => ['like', 'm.username'],
            ]);
        foreach ($data['data'] as &$v) {
            $v['created_at'] = date('Y-m-d H:i:s', $v['created_at']);
        }
        return $data;
    }

    /**
     * 内容刷入缓存
     */
    public function updateContent()
    {
        redis::app()->hSet('ReceptionContent', $this->no, $this->content);
    }

    /**
     * 获取缓存内容
     * @param string $key
     * @return string
     */
    public static function getContent($key = '')
    {
        return redis::app()->hGet('ReceptionContent', $key);
    }
}
