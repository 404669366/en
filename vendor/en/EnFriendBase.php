<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_friend".
 *
 * @property int $id
 * @property string $name 名称
 * @property string $icon 图标
 * @property string $link 链接
 * @property string $sort 排序
 */
class EnFriendBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_friend';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'icon'], 'required'],
            [['id', 'sort'], 'integer'],
            [['name', 'link'], 'string', 'max' => 255],
            [['icon'], 'string', 'max' => 800],
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
            'icon' => '图标',
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
        return self::find()->page([
            'name' => ['like', 'name']
        ]);
    }

    /**
     * 友情链接刷入缓存
     * @param bool $del
     */
    public function updateFriend($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionFriend', $del);
        } else {
            redis::app()->hSet('ReceptionFriend', $this->id, json_encode([
                'name' => $this->name, 'icon' => $this->icon,
                'link' => $this->link, 'sort' => $this->sort
            ]));
        }
    }

    /**
     * 友情链接
     * @return string
     */
    public static function getFriend()
    {
        $str = '';
        $data = redis::app()->hGetAll('ReceptionFriend');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                $str .= <<<HTML
                <li><a href="{$v['link']}"><img src="{$v['icon']}"> {$v['name']}</a></li>
HTML;
            }
        }
        return $str;
    }
}
