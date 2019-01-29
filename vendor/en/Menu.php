<?php

namespace vendor\en;

use vendor\helpers\redis;
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

    /**
     * 获取分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $data = self::find()->page([
            'name' => ['like', 'name']
        ]);
        return $data;
    }

    /**
     * 更新缓存
     * @param $id
     */
    public function updateMenu($id = false)
    {
        if ($id) {
            redis::app()->hDel('PlatformMenu', $id);
        } else {
            redis::app()->hSet('PlatformMenu', $this->id, json_encode([
                'name' => $this->name, 'url' => $this->url,
                'sort' => $this->sort
            ]));
        }
    }

    /**
     * 获取菜单
     * @return array
     */
    public static function getMenu()
    {
        $menu = [];
        $data = redis::app()->hGetAll('PlatformMenu');
        if ($data) {
            $sort = [];
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                array_push($menu, $v);
            }
        }
        return $menu;
    }
}
