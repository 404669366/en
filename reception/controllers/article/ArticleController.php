<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/12
 * Time: 15:32
 */

namespace app\controllers\article;


use app\controllers\basis\BasisController;
use vendor\en\EnArticleBase;

class ArticleController extends BasisController
{
    /**
     * 获取新闻分页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rPageJson(EnArticleBase::getNews());
    }
}