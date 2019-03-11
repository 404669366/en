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
use vendor\en\Intention;
use vendor\helpers\BasisData;
use vendor\helpers\Msg;

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
        return $this->rJson(Field::getFields($type, 4));
    }

    /**
     * 渲染列表页
     * @return string
     */
    public function actionList()
    {
        $fields = Field::getFieldData(\Yii::$app->request->get());
        Msg::set("共为您找到{$fields['total']}个场地");
        return $this->render('list', [
            'fields' => $fields,
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
            return $this->render('details', [
                'model' => $model,
                'list' => Intention::getFieldIntentionInfo($no),
                'recommends' => Field::getRecommendField(4)
            ]);
        }
        return $this->redirect(['not-find'], '场地不见了');
    }

    /**
     * 获取合伙人场地
     * @param $cobber_id
     * @return string
     */
    public function actionCobberField($cobber_id)
    {
        return $this->render('cobber-field', ['datas' => Field::getCobberField($cobber_id)]);
    }

    public function actionNotFind()
    {
        return $this->render('404');
    }
}