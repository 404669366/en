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
use vendor\en\Model;
use vendor\helpers\Constant;
use vendor\helpers\Msg;

class ModelController extends CommonController
{
    /**
     * 电桩型号列表页面
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', ['type' => Constant::getModelType(), 'standard' => Constant::getModelStandard()]);
    }

    /**
     * 电桩型号列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Model::getPageData());
    }

    /**
     * 添加电桩型号页面
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Model();
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Model' => $data]) && $model->validate()) {
                $model->created = time();
                $model->save();
                Msg::set('操作成功');
                return $this->redirect(['list']);
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->render('add');
    }

    /**
     * 电桩型号详情页面
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Model::findOne($id);
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if ($model->load(['Model' => $data]) && $model->validate() && $model->save()) {
                Msg::set('操作成功');
                return $this->redirect(['list']);
            } else {
                Msg::set($model->errors());
            }
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 删除电桩型号
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        Msg::set('已绑定电桩不能删除');
        if (!Electricize::find()->where(['model_id' => $id])->count()) {
            Model::findOne($id)->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}