<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/11/18
 * Time: 16:50
 */

namespace app\controllers\index;


use app\controllers\basis\BasisController;
use vendor\en\Field;
use vendor\helpers\BasisData;

class IndexController extends BasisController
{
    /**
     * 渲染首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'field1' => Field::getFields(1),
            'field2' => Field::getFields(2),
            'field3' => Field::getFields(3),
            'field4' => Field::getFields(4)
        ]);
    }

    public function actionList()
    {
        return $this->render('list');
    }

    public function actionDetails()
    {
        return $this->render('details');
    }

    public function actionNotFind()
    {
        return $this->render('404');
    }
}