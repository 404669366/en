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
        return $this->render('index');
    }

    /**
     * 首页场地数据接口
     * @param int $type
     * @return string
     */
    public function actionFields($type = 0)
    {
        return $this->rJson(Field::getFields($type));
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