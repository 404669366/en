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
 * @property string $intro 产品介绍
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
            [['name','image','intro'], 'required'],
            [['sort'], 'integer'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 600],
            [['intro'], 'string', 'max' => 10000],
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
            'intro' => '产品介绍',
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
            $strArr = [];
            foreach ($data as &$v) {
                $str = <<<HTML
                    <div class="row">
                        <div class="col-md-6">
                            <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                                <img src="{$v['image']}" alt="" class="img-responsive" style="height: 30rem">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="message-box right-ab">
                                <h3 style="text-align: center;font-size: 28px">{$v['name']}</h3>
                               {$v['intro']}
                            </div>
                        </div>
                    </div>
HTML;
                array_push($strArr, $str);
            }
            $str = implode('<hr class="hr1">', $strArr);
        }
        return $str;
    }
}