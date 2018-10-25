<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "en_nav".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $url 路由
 * @property string $sort 排序
 * @property string $background 背景图
 */
class EnNavBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'en_nav';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'name', 'url'], 'required'],
            [['name'], 'unique'],
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 255],
            [['background'], 'string', 'max' => 500],
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
            'url' => '路由',
            'sort' => '排序',
            'background' => '背景图',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        return self::find()->page([
            'name' => ['like', 'name'],
        ]);
    }

    /**
     * 更新导航栏缓存
     * @param bool $del
     */
    public function updateNav($del = false)
    {
        if ($del) {
            redis::app()->hDel('ReceptionNav', $del);
        } else {
            redis::app()->hSet('ReceptionNav', $this->id, json_encode([
                'name' => $this->name, 'url' => $this->url,
                'sort' => $this->sort, 'background' => $this->background
            ]));
        }
    }

    /**
     * 记录当前菜单
     * @param string $name
     */
    public static function setNow($name = '')
    {
        if ($name) {
            \Yii::$app->session->set('ReceptionMenuNow', $name);
        }
    }

    /**
     * 返回导航栏
     * @return array
     */
    public static function getNav()
    {
        $navStr = [
            'topStr' => '',
            'botStr' => '',
            'headStr' => '',
        ];
        $nav = redis::app()->hGetAll('ReceptionNav');
        if ($nav) {
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            array_unshift($nav, ['name' => '首页', 'url' => 'http://' . $_SERVER['SERVER_NAME'], 'sort' => 0]);
            $now = \Yii::$app->session->get('ReceptionMenuNow');
            foreach ($nav as &$v) {
                if ($v['name'] == $now) {
                    $navStr['topStr'] .= '<li><a href="' . $v['url'] . '" class="active">' . $v['name'] . '</a></li>';
                    if ($now != '首页') {
                        $navStr['headStr'] = <<<HTML
                            <div class="all-title-box" style="background: url('{$v['background']}')">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>{$v['name']}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
HTML;
                    }

                } else {
                    $navStr['topStr'] .= '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
                }
                $navStr['botStr'] .= '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
            }
        }
        return $navStr;
    }
}
