<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_salesman".
 *
 * @property int $id
 * @property string $region 所在地理位置
 * @property string $intro 介绍
 * @property string $image 头像
 * @property string $name 姓名
 * @property string $tel 电话
 * @property int $sort 排序
 */
class EnSalesmanBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_salesman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['region','intro','image','name','tel','sort'], 'required'],
            [['region'], 'string', 'max' => 255],
            [['intro'], 'string', 'max' => 2000],
            [['image'], 'string', 'max' => 1000],
            [['name'], 'string', 'max' => 10],
            [['tel'], 'string', 'max' => 11],
            [['sort'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'region' => '所在地理位置',
            'intro' => '介绍',
            'image' => '头像',
            'name' => '姓名',
            'tel' => '电话',
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
            ->select(['id', 'region', 'intro', 'name', 'tel','sort'])
            ->page([
                'name' => ['like', 'name'],
                'tel' => ['like', 'tel'],
            ]);
    }

    /**
     * 更新业务员
     * @param bool $del
     */
    public function updateSalesman($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionSalesman', $del);
        } else {
            redis::app()->hSet('ReceptionSalesman', $this->id, json_encode([
                'region' => $this->region, 'intro' => $this->intro,
                'image' => $this->image, 'name' => $this->name,
                'tel' => $this->tel, 'sort' => $this->sort

            ]));
        }
    }

    /**
     * 插入业务员
     * @return string
     */
    public static function getSalesman()
    {
        $str = '';
        $nav = redis::app()->hGetAll('ReceptionSalesman');
        if ($nav) {
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            foreach ($nav as &$v) {
                $str .= <<<HTML
                
                    <div class="testimonial clearfix">
                        <div class="desc">
                            <h3><i class="fa fa-quote-left"></i>{$v['region']} <i class="fa fa-quote-right"></i>
                            </h3>
                            <p class="lead">{$v['intro']}</p>

                        </div>
                        <div class="testi-meta">
                            <img src="{$v['image']}" alt="" class="img-responsive alignleft">
                            <h4>{$v['name']}
                                <small>{$v['tel']}</small>
                            </h4>
                        </div>
                    </div>
HTML;
            }
        }
        return $str;
    }
}
