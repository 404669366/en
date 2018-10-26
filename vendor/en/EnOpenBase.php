<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_open".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $image 图片
 * @property string $content 文本内容
 * @property int $sort 排序
 * @property string $link 链接
 */
class EnOpenBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_open';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'title', 'image', 'link'], 'required'],
            [['sort'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 500],
            [['content'], 'string', 'max' => 3000],
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
            'content' => '文本内容',
            'sort' => '排序',
            'link' => '链接',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()
            ->select(['id', 'title', 'content', 'sort', 'link'])
            ->page([
                'title' => ['like', 'title'],
                'content' => ['like', 'content'],
            ]);
    }

    /**
     * 更新开放平台
     * @param bool $del
     */
    public function updateOpen($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionOpen', $del);
        } else {
            redis::app()->hSet('ReceptionOpen', $this->id, json_encode([
                'title' => $this->title, 'content' => $this->content,
                'sort' => $this->sort, 'image' => $this->image, 'link' => $this->link
            ]));
        }
    }

    /**
     * 插入开放平台
     * @return string
     */
    public static function getOpen()
    {
        $str = '';
        $nav = redis::app()->hGetAll('ReceptionOpen');
        if ($nav) {
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            foreach ($nav as &$v) {
                $link = $v['link'] ? ' <a href="' . $v['link'] . '" class="btn btn-light btn-radius grd1 btn-brd"> 查看详情 </a>' : '';
                $str .= <<<HTML
                <div class="col-md-4 col-sm-4 col-sm-12 marginBottom">
                    <div class="single-services">
                        <div class="single-services-img">
                            <img src="{$v['image']}" class="img-responsive" alt="" style="height: 10rem;width: 66%">
                        </div>
                        <div class="single-services-desc">
                            <h4>{$v['title']}</h4>
                            <p>{$v['content']}</p>
                        </div>
                        $link
                    </div>
                </div>
HTML;
            }
        }
        return $str;
    }
}

