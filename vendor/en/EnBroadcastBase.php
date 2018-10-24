<?php

namespace vendor\en;

use vendor\helpers\Constant;
use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_broadcast".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $image 轮播图
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
            [['name', 'image', 'sort'], 'required'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['image'], 'string', 'max' => 500],
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
            ->select(['id', 'name', 'sort'])
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
                'name' => $this->name, 'image' => $this->image, 'sort' => $this->sort
            ]));
        }
    }

    /**
     * 轮播图
     * @return string
     */
    public static function getBro()
    {
        $str = '';
        $nav = redis::app()->hGetAll('ReceptionBro');
        if ($nav) {
            $interval = Constant::broInterval();
            $allInterval = count($nav) * $interval;
            $commonStyle = "-webkit-animation: imageAnimation {$allInterval}s linear infinite 0s;-moz-animation: imageAnimation {$allInterval}s linear infinite 0s;animation: imageAnimation {$allInterval}s linear infinite 0s;";
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            $i = 0;
            foreach ($nav as &$v) {
                $nowInterval = $interval * $i;
                $style = $commonStyle . "background-image: url({$v['image']});-webkit-animation-delay: {$nowInterval}s;-moz-animation-delay: {$nowInterval}s;animation-delay: {$nowInterval}s;";
                $str .= '<li><span style="' . $style . '">' . $v['name'] . '</span></li>';
                $i++;
            }
        }
        return $str;
    }
}
