<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_broadcast".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $image 轮播图
 * @property string $link 链接
 * @property string $sort 排序
 */
class EnBroadcastBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_broadcast';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['image', 'link'], 'string', 'max' => 500],
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
            'image' => '轮播图',
            'link' => '链接',
            'sort' => '排序',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()
            ->select(['id', 'name', 'link', 'sort'])
            ->page([
                'name' => ['like', 'name'],
            ]);
    }

    /**
     * 更新轮播图缓存
     * @param bool $del
     */
    public function updateBro($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionBro', $del);
        } else {
            redis::app()->hSet('ReceptionBro', $this->id, json_encode([
                'name' => $this->name, 'image' => $this->image,
                'link' => $this->link, 'sort' => $this->sort
            ]));
        }
    }
}
