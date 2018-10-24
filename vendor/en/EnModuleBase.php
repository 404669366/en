<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_module".
 *
 * @property int $id
 * @property string $title 标题
 * @property string $image 图片
 * @property string $content 内容
 * @property string $remark 备注
 */
class EnModuleBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image'], 'required'],
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
     * 更新轮播图缓存
     * @param bool $del
     */
    public function updateModule($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionModule', $del);
        } else {
            redis::app()->hSet('ReceptionModule', $this->id, json_encode([
                'title' => $this->title, 'content' => $this->content,
                'sort' => $this->sort, 'image' => $this->image,
            ]));
        }
    }

    /**
     * 轮播图
     * @return string
     */
    public static function getModule()
    {
        $str = '';
        $nav = redis::app()->hGetAll('ReceptionModule');
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
                            <div class="icon"><img style="width: 10rem;height: 10rem" src="{$v['image']}" class="img-responsive" alt=""></div>
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
