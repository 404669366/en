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
     * @param $type
     * @return string
     */
    public function actionData($type)
    {
        return $this->rJson(Field::getFields($type, 6));
    }

    /**
     * 渲染列表页
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'fields' => Field::getFieldData(\Yii::$app->request->get()),
            'recommend' => Field::getRecommendField()
        ]);
    }


    /**
     * 渲染详情页
     * @param $no
     * @return string
     */
    public function actionDetails($no)
    {
        if ($model = Field::getDetailFields($no)) {
            return $this->render('details', ['model' => $model, 'recommends' => Field::getRecommendField(8)]);
        }
        return $this->redirect(['not-find'], '场地不见了');
    }


    public function actionNotFind()
    {
        return $this->render('404');
    }
}