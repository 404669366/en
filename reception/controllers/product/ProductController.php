<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/6
 * Time: 16:37
 */

namespace app\controllers\product;


use app\controllers\basis\BasisController;
use vendor\en\EnProductBase;

class ProductController extends BasisController
{
    /**
     * 渲染产品详情
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        return $this->render('detail', ['model' => EnProductBase::getDetail($id)]);
    }

    public function actionData(){
        return $this->rPageJson(EnProductBase::getProducts());
    }
}