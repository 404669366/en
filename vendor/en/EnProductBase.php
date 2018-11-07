<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_product".
 *
 * @property int $id
 * @property string $name 产品名称
 * @property string $image 图片
 * @property string $parameter 参数图片
 * @property string $intro 产品介绍
 * @property string $summary 产品简介
 * @property string $price 价格
 * @property string $power 功率
 * @property string $para 分段
 * @property string $electric_loss 电损率
 * @property string $availability 利用率
 * @property string $electrovalency 参考服务费
 * @property int $sort 排序
 */
class EnProductBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image', 'intro', 'price', 'power', 'para', 'electric_loss', 'availability', 'electrovalency', 'summary', 'parameter'], 'required'],
            [['name'], 'unique'],
            [['sort'], 'integer'],
            [['name', 'summary'], 'string', 'max' => 255],
            [['image', 'parameter'], 'string', 'max' => 600],
            [['intro'], 'string', 'max' => 10000],
            [['price'], 'string', 'max' => 20],
            [['power'], 'string', 'max' => 8],
            [['para'], 'string', 'max' => 30],
            [['electric_loss', 'availability', 'electrovalency'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '产品名称',
            'image' => '图片',
            'parameter' => '参数图片',
            'intro' => '产品介绍',
            'summary' => '产品简介',
            'price' => '价格',
            'power' => '功率',
            'para' => '分段',
            'electric_loss' => '电损率',
            'availability' => '利用率',
            'electrovalency' => '参考服务费',
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
            ->select(['id', 'name', 'price', 'power', 'para', 'electric_loss', 'availability', 'electrovalency', 'sort'])
            ->page([
                'name' => ['like', 'name'],
            ]);
    }

    /**
     * 更新产品配置
     * @param bool $del
     */
    public function updateProduct($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionProduct', $del);
        } else {
            redis::app()->hSet('ReceptionProduct', $this->id, json_encode([
                'name' => $this->name, 'image' => $this->image,
                'sort' => $this->sort, 'intro' => $this->intro,
                'price' => $this->price, 'power' => $this->power,
                'para' => $this->para, 'electric_loss' => $this->electric_loss,
                'summary' => $this->summary, 'availability' => $this->availability,
                'electrovalency' => $this->electrovalency, 'id' => $this->id,
                'parameter' => $this->parameter
            ]));
        }
    }


    /**
     * 获取产品详情
     * @return string
     */
    public static function getProduct()
    {
        $str = '';
        $data = redis::app()->hGetAll('ReceptionProduct');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                $str .= <<<HTML
                    <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="service-widget">
                    <div class="property-main">
                        <div class="property-wrap">
                            <figure class="post-media wow fadeIn">
                                <a href="/product/product/detail?id={$v['id']}" class="hoverbutton global-radius"><i
                                            class="flaticon-unlink"></i></a>
                                <img src="{$v['image']}" alt="" class="img-responsive" style="height: 24rem">
                                <div class="price">
                                    <span class="item-sub-price">￥{$v['price']}</span>
                                </div>
                            </figure>
                            <a href="/product/product/detail?id={$v['id']}">
                                <div class="item-body">

                                    <h3>{$v['name']}</h3>
                                    <div class="info">
                                      {$v['summary']}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
HTML;
            }
        }
        return $str;
    }

    /**
     * 返回产品信息
     * @param int $id
     * @return array|mixed|string
     */
    public static function getPiles($id = 0)
    {
        if ($id) {
            $data = redis::app()->hGet('ReceptionProduct', $id);
            if ($data) {
                $data = json_decode($data, true);
                unset($data['intro'], $data['image'], $data['parameter']);
                return $data;
            }
            return [];
        }
        $data = redis::app()->hGetAll('ReceptionProduct');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            $arr = [];
            foreach ($data as &$v) {
                unset($v['intro'], $v['image'], $v['parameter']);
                $arr[$v['id']] = $v;
            }
            return json_encode($arr);
        }
        return '';
    }

    /**
     * 基础预测
     * @param $data
     * @return array
     */
    public static function baseBudget($data)
    {
        $result = [
            'piles' => [],
            'transformer' => [],
            'totalPower' => 0,
            'totalPrice' => 0,
        ];
        foreach ($data as $v) {
            $pile = self::getPiles($v['id']);
            if ($pile) {
                array_push($result['piles'], [
                    'name' => $pile['name'], 'power' => $pile['power'],
                    'num' => $v['num'], 'gunPower' => $pile['power'] / $v['num'],
                    'price' => $pile['price']
                ]);
                $result['totalPower'] += $pile['power'];
                $result['totalPrice'] += $pile['price'];
            }
        }
        if ($result['piles']) {
            $result['transformer'] = EnTransformerBase::getNowTransformer($result['totalPower']);
            $result['totalPrice'] += $result['transformer']['price'];
            return $result;
        }
        return [];
    }

    /**
     * 返回产品详情
     * @param int $id
     * @return mixed
     */
    public static function getDetail($id = 0)
    {
        return json_decode(redis::app()->hGet('ReceptionProduct', $id), true);
    }
}
