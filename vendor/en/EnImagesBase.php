<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_images".
 *
 * @property string $id
 * @property string $image 图片链接
 * @property string $remark 备注
 * @property string $sort 排序
 */
class EnImagesBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image'], 'required'],
            [['sort'], 'integer'],
            [['sort'], 'integer'],
            [['image'], 'string', 'max' => 500],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => '图片链接',
            'remark' => '备注',
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
            'remark' => ['like', 'remark'],
        ]);
    }

    /**
     * 更新导航栏缓存
     * @param bool $del
     */
    public function updateImages($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionImages', $del);
        } else {
            redis::app()->hSet('ReceptionImages', $this->id, json_encode(['image' => $this->image, 'sort' => $this->sort]));
        }
    }

    /**
     * 轮播图
     * @return string
     */
    public static function getImages()
    {
        $str = '';
        $images = redis::app()->hGetAll('ReceptionImages');
        if ($images) {
            foreach ($images as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $images);
            foreach ($images as &$v) {
                $str .= <<<HTML
                <div class="post-media_g pitem item-w1 item-h1 cat1">
                    <a href="{$v['image']}" data-rel="prettyPhoto[gal]">
                        <img src="{$v['image']}" alt="" class="img-responsive">
                        <div><i class="flaticon-unlink"></i></div>
                    </a>
                </div>
HTML;
            }
        }
        return $str;
    }
}
