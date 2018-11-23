<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/23
 * Time: 11:39
 */

namespace app\controllers\commissioner;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;

class FirstController extends CommonController
{
    /**
     * 一审列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'status' => Constant::getFieldStatus([4,5,6])
        ]);
    }

    /**
     * 一审列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData([Field::getPageData([4, 5, 6]), \Yii::$app->user->id, 1]);
    }

    /**
     * 一审列表详情
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        if(\Yii::$app->request->isPost){
            $data=\Yii::$app->request->post();

        }
        $data = Field::findOne(['id' => $id, 'member_id' => \Yii::$app->user->id, 'status' => [2, 4]]);
        return $this->render('detail', ['data' => $data, 'status' => Constant::getFieldStatus()]);
    }
}