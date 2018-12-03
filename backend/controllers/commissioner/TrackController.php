<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/11/23
 * Time: 15:42
 */

namespace app\controllers\commissioner;


use app\controllers\basis\CommonController;
use vendor\en\Field;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class TrackController extends CommonController
{
    /**
     * 场地跟踪列表
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['status' => Constant::getFieldStatus([8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20])]);
    }

    /**
     * 场地跟踪列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Field::getPageData([8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20], \Yii::$app->user->id, 1));
    }

    /**
     * 场地跟踪列表详情
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionDetail($id)
    {
        if ($model = Field::findOne(['id' => $id, 'member_id' => \Yii::$app->user->id])) {
            return $this->render('detail', [
                'model' => $model,
                'status' => Constant::getFieldStatus()
            ]);
        }
        Msg::set('场地不存在');
        return $this->redirect(['list']);
    }
}