<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_serve".
 *
 * @property int $id
 * @property string $name 服务名称
 * @property string $smallImage 服务小图
 * @property string $bigImage 服务大图
 * @property string $resume 服务简述
 * @property string $content 服务详情
 * @property string $sort 排序
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
            [['name', 'smallImage', 'bigImage', 'resume', 'content'], 'required'],
            [['name'], 'unique'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['smallImage', 'bigImage'], 'string', 'max' => 500],
            [['resume'], 'string', 'max' => 255],
            [['content'], 'string', 'max' => 5000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '服务名称',
            'smallImage' => '服务小图',
            'bigImage' => '服务大图',
            'resume' => '服务简述',
            'content' => '服务详情',
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
            ->select(['id', 'name', 'resume', 'sort'])
            ->page([
                'name' => ['like', 'name', 'resume'],
            ]);
    }

    /**
     * 更新服务配置
     * @param bool $del
     */
    public function updateServe($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionServe', $del);
        } else {
            redis::app()->hSet('ReceptionServe', $this->id, json_encode([
                'name' => $this->name, 'content' => $this->content,
                'sort' => $this->sort, 'smallImage' => $this->smallImage,
                'bigImage' => $this->bigImage, 'resume' => $this->resume,
                'id' => $this->id
            ]));
        }
    }

    /**
     * 获取服务简述
     * @return string
     */
    public static function getServe()
    {
        $str = '';
        $data = redis::app()->hGetAll('ReceptionServe');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                $str .= <<<HTML
                    <div class="item">
                        <a href="/menu/menu/about">
                        <div class="single-feature">
                            <div class="icon"><img style="width: 12rem;height: 10rem" src="{$v['smallImage']}" class="img-responsive" alt=""></div>
                            <h4 class="home3">{$v['name']}</h4>
                            <p class="home4">{$v['resume']}</p>
                        </div>
                        </a>
                    </div>
HTML;
            }
        }
        return $str;
    }

    /**
     * 获取服务详情
     * @return string
     */
    public static function getServerContent()
    {
        $str = '';
        $data = redis::app()->hGetAll('ReceptionServe');
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
                                <img src="{$v['bigImage']}" alt="" class="img-responsive" style="height: 30rem">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="message-box right-ab">
                                <h3 style="text-align: center;font-size: 28px">{$v['name']}</h3>
                               {$v['content']}
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

    /**
     * 前台用业务数据
     * @return array
     */
    public static function getReceptionServes()
    {
        $reArr = [];
        $data = redis::app()->hGetAll('ReceptionServe');
        if ($data) {
            foreach ($data as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $data);
            foreach ($data as &$v) {
                $reArr[$v['id']] = $v['name'];
            }
        }
        return $reArr;
    }
}
