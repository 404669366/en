<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_serve".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $image 图片
 * @property string $content 内容
 * @property int $sort 排序
 * @property string $remark 备注
 */
class EnServeBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_serve';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image'], 'required'],
            [['sort'], 'integer'],
            [['title', 'remark'], 'string', 'max' => 255],
            [['image', 'content'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'image' => '图片',
            'content' => '内容',
            'sort' => '排序',
            'remark' => '备注',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()
            ->select(['id', 'title', 'content', 'sort', 'remark'])
            ->page([
                'title' => ['like', 'title'],
                'content' => ['like', 'content'],
            ]);
    }

    /**
     * 更新模块
     * @param bool $del
     */
    public function updateServe($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionServe', $del);
        } else {
            redis::app()->hSet('ReceptionServe', $this->id, json_encode([
                'title' => $this->title, 'content' => $this->content,
                'sort' => $this->sort, 'image' => $this->image,
            ]));
        }
    }

    /**
     * 插入模块
     * @return string
     */
    public static function getServe()
    {
        $str = '';
        $nav = redis::app()->hGetAll('ReceptionServe');
        if ($nav) {
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            foreach ($nav as &$v) {
                $str .= <<<HTML
                    <div class="item">
                        <div class="single-feature">
                            <div class="icon"><img style="width: 13rem;height: 10rem" src="{$v['image']}" class="img-responsive" alt=""></div>
                            <h4 class="home3">{$v['title']}</h4>
                            <p class="home4">{$v['content']}</p>
                        </div>
                    </div>
HTML;
            }
        }
        return $str;
    }
}
