<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_contact".
 *
 * @property int $id
 * @property string $contact 联系方式
 * @property string $link 链接
 * @property string $sort 排序
 */
class EnContactBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_contact';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['contact', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'contact' => '联系方式',
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
            ->select(['id', 'contact', 'link', 'sort'])
            ->page([
                'contact' => ['like', 'contact'],
            ]);
    }

    /**
     * 更新轮播图缓存
     * @param bool $del
     */
    public function updateContact($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionContact', $del);
        } else {
            redis::app()->hSet('ReceptionContact', $this->id, json_encode([
                'contact' => $this->contact, 'link' => $this->link,
                'sort' => $this->sort,
            ]));
        }
    }

    /**
     * 友情链接
     * @return string
     */
    public static function getContact()
    {
        $str = '';
        $data = redis::app()->hGetAll('ReceptionContact');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                $str .= <<<HTML
                 <li><a href="{$v['link']}">{$v['contact']}</a></li>
HTML;
            }
        }
        return $str;
    }
}
