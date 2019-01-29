<?php

namespace vendor\en;

use vendor\helpers\redis;
use Yii;

/**
 * This is the model class for table "{{%en_article}}".
 *
 * @property int $id
 * @property string $title 文章标题
 * @property string $seo_keywords SEO关键词
 * @property string $seo_title SEO关键标题
 * @property string $seo_content SEO内容描述
 * @property string $summary 文章简介
 * @property string $content 文章内容
 * @property string $image 图片
 * @property string $author 作者
 * @property string $source 来源
 * @property int $sort 排序
 * @property string $created 创建时间
 * @property string $modified 更新时间
 */
class EnArticleBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%en_article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort'], 'integer'],
            [['title', 'seo_keywords', 'seo_title', 'seo_content', 'summary', 'image', 'source'], 'string', 'max' => 255],
            [['title', 'seo_keywords', 'image', 'summary', 'seo_title', 'seo_content', 'author', 'source'], 'required'],
            [['content'], 'string', 'max' => 10000],
            [['author'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '文章标题',
            'seo_keywords' => 'SEO关键词',
            'seo_title' => 'SEO标题',
            'seo_content' => 'SEO内容描述',
            'summary' => '文章简介',
            'content' => '文章内容',
            'image' => '图片',
            'author' => '作者',
            'source' => '来源',
            'sort' => '排序',
            'created' => '创建时间',
            'modified' => '更新时间',
        ];
    }

    /**
     * 分页数据
     * @return mixed
     */
    public static function getPageData()
    {
        $rs = self::find()
            ->page([
                'title' => ['like', 'title'],
                'author' => ['like', 'author'],
            ]);
        foreach ($rs['data'] as &$r) {
            $r['created'] = date("Y-m-d H:i:s", $r['created']);
            $r['modified'] = date("Y-m-d H:i:s", $r['modified']);
        }
        return $rs;
    }

    /**
     * 返回前台文章列表数据
     * @return string
     */
    public static function getNews()
    {
        return self::find()->orderBy('created desc')->page();
    }

    /**
     * 文章seo
     * @param int $id
     * @return bool|string
     */
    public static function newsSeo($id = 0)
    {
        if ($id) {
            Yii::$app->session->set('NEWS_ID', $id);
            return true;
        } else {
            $seo = '';
            $id = Yii::$app->session->get('NEWS_ID', 0);
            Yii::$app->session->set('NEWS_ID', 0);
            if ($model = self::findOne($id)) {
                $seo .= '<title>' . $model->seo_title . '</title>';
                $seo .= '<meta name="keywords" content="' . $model->seo_keywords . '">';
                $seo .= '<meta name="description" content="' . $model->seo_content . '">';
            }
            return $seo;
        }
    }
}
