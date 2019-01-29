<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "friends".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $image 图片
 * @property string $url 路由
 * @property string $sort 排序
 */
class Friends extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'friends';
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

    /**
     * 获取友情链接数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()
            ->page([
                'name' => ['like', 'name']
            ]);
        return $data;
    }

    /**
     * 更新缓存
     * @param $id
     */
    public function updateFriends($id = false)
    {
        if ($id) {
            redis::app()->hDel('PlatformFriends', $id);
        } else {
            redis::app()->hSet('PlatformFriends', $this->id, json_encode([
                'name' => $this->name, 'image' => $this->image,
                'url' => $this->url, 'sort' => $this->sort,
            ]));
        }
    }

    public static function getFriends()
    {
        $new = [];
        $data = redis::app()->hGetAll('PlatformFriends');
        if ($data) {
            $sort = [];
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                array_push($new, $v);
            }
        }
        return $new;
    }
}
