<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/16
 * Time: 14:26
 */

namespace app\controllers\job;


use app\controllers\basis\CommonController;
use app\model\validate;
use vendor\en\EnPowerBase;
use vendor\helpers\Constant;
use vendor\helpers\Helper;
use vendor\helpers\Msg;

class PowerController extends CommonController
{
    /**
     * 权限列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list', [
            'types' => Constant::powerType()
        ]);
    }

    /**
     * 权限列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(EnPowerBase::getPageData());
    }

    /**
     * 新增权限
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new EnPowerBase();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnPowerBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add', [
            'types' => Constant::powerType(),
            'tops' => $model::getTopPowers(),
            'no' => Helper::randStr(3, 8)
        ]);
    }

    /**
     * 修改权限
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = EnPowerBase::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['EnPowerBase' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', [
            'model' => $model,
            'types' => Constant::powerType(),
            'tops' => $model::getTopPowers($id)
        ]);
    }

    /**
     * 删除权限
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = EnPowerBase::findOne($id);
        Msg::set('删除失败');
        if ($model) {
            $model->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}