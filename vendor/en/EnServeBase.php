<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_serve".
 *
 * @property int $id
 * @property string $name 业务名称
 * @property string $bigImage 业务大图
 * @property string $content 业务详情
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
            [['name', 'bigImage', 'content'], 'required'],
            [['name'], 'unique'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            ['bigImage', 'string', 'max' => 500],
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
            'name' => '业务名称',
            'bigImage' => '业务大图',
            'content' => '业务详情',
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
     * 更新业务配置
     * @param bool $del
     */
    public function updateServe($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionServe', $del);
        } else {
            redis::app()->hSet('ReceptionServe', $this->id, json_encode([
                'name' => $this->name, 'content' => $this->content,
                'sort' => $this->sort, 'bigImage' => $this->bigImage,
                'id' => $this->id
            ]));
        }
    }

    /**
     * 获取业务详情
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
                if($v['id']%2 == 1){
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
                }else{
                    $str = <<<HTML
                    <div class="row"style="background: orange">
                        <div class="col-md-6">
                            <div class="message-box right-ab">
                                <h3 style="text-align: center;font-size: 28px">{$v['name']}</h3>
                               {$v['content']}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="post-media wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                                <img src="{$v['bigImage']}" alt="" class="img-responsive" style="height: 30rem">
                            </div>
                        </div>
                    </div>
HTML;
                }

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
