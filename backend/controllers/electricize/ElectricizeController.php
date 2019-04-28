<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2019/4/10
 * Time: 15:05
 */

namespace app\controllers\electricize;


use app\controllers\basis\CommonController;
use vendor\en\Electricize;
use vendor\helpers\Constant;
use vendor\helpers\Msg;
use vendor\helpers\redis;

class ElectricizeController extends CommonController
{
    /**
     * 电桩列表页面
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 电桩列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Electricize::getPageData());
    }

    public function actionInfo()
    {
        $data = [['no' => 3333, 'num' => 4]];
        return $this->render('info', ['data' => $data]);
    }

    /**
     * 添加电桩页面
     * @return string|\yii\web\Response
     */
    public function actionAdd($no, $num)
    {

        $model = new Electricize();
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Electricize' => $data]) && $model->validate()) {
                $model->created = time();
                $model->save();
                Msg::set('操作成功');
                return $this->redirect(['list']);
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->render('add', ["no" => $no, "num" => $num]);
    }

    /**
     * 电桩详情页面
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Electricize::findOne($id);
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Electricize' => $data]) && $model->validate() && $model->save()) {
                Msg::set('操作成功');
                return $this->redirect(['list']);
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 电桩故障查询页面
     * @param string $no
     * @param int $start
     * @return string
     */
    public function actionError($no = '', $start = 0)
    {
        if ($no !== '') {
            $data = [];
            if ($one = redis::app()->getPageOne('asdf', $no)) {
                $data = [$no => $one];
            } else {
                Msg::set('没有该电桩信息');
            }
            return $this->render('error', ['data' => $data, 'start' => $start, 'status' => 1]);
        } else {
            $data = redis::app()->getPageData('asdf', $start, 2, 'asc');
            if (!$data) {
                $start -= 2;
                $data = redis::app()->getPageData('asdf', $start, 2, 'asc');
            }
        }
        return $this->render('error', ['data' => $data, 'start' => $start]);
    }

    /**
     * 电桩故障页面
     * @param $no
     * @return string
     */
    public function actionErrorDetail($no)
    {
        $data = json_decode(redis::app()->getPageOne('asdf', $no), true);
        return $this->render('error-detail', ['data' => $data, 'no' => $no]);
    }
}