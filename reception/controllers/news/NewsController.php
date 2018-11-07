<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/6
 * Time: 10:09
 */

namespace app\controllers\news;

use app\controllers\basis\BasisController;
use vendor\en\EnArticleBase;

class NewsController extends BasisController
{

    /**
     * 新闻详情页
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        EnArticleBase::newsSeo($id);
        return $this->render('detail', ['model' => EnArticleBase::findOne($id)]);
    }
}