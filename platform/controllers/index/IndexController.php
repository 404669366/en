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
        return $this->render('index', ['data' => BasisData::getBasisData()]);
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

    public function actionList()
    {
        return $this->render('list');
    }


    /**
     * 渲染详情页
     * @return string
     */
    public function actionDetails($no)
    {
        return $this->render('details', ['model' => Field::getDetailFields($no)]);
    }


    public function actionNotFind()
    {
        return $this->render('404');
    }
}