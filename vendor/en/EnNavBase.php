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
            [['sort'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 255],
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
            redis::app()->hSet('ReceptionNav', $this->id, json_encode(['name' => $this->name, 'url' => $this->url, 'sort' => $this->sort]));
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
        ];
        $nav = redis::app()->hGetAll('ReceptionNav');
        if ($nav) {
            foreach ($nav as $k => &$v) {
                $v = json_decode($v, true);
                $sort[$k] = $v['sort'];
            }
            array_multisort($sort, SORT_ASC, $nav);
            $now = \Yii::$app->session->get('ReceptionMenuNow');
            foreach ($nav as &$v) {
                if ($v['name'] == $now) {
                    $navStr['topStr'] .= '<li><a href="' . $v['url'] . '" class="active">' . $v['name'] . '</a></li>';
                } else {
                    $navStr['topStr'] .= '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
                }
                $navStr['botStr'] .= '<li><a href="' . $v['url'] . '">' . $v['name'] . '</a></li>';
            }
        }
        return $navStr;
    }
}