<?php
/**
 * Created by PhpStorm.
 * User: lt
 * Date: 2018/12/3
 * Time: 12:35
 */

namespace app\controllers\config;


use app\controllers\basis\CommonController;
use vendor\en\Menu;
use vendor\helpers\Msg;

class MenuController extends CommonController
{
    /**
     * 渲染菜单列表页
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 获取菜单列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Menu::getPageData());
    }

    /**
     * 添加菜单
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Menu();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['Menu' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                $model->updateMenu();
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add', ['model' => $model]);
    }

    /**
     * 修改菜单
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Menu::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($model->load(['Menu' => $post]) && $model->validate() && $model->save()) {
                Msg::set('保存成功');
                $model->updateMenu();
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * 删除菜单
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = Menu::findOne($id);
        if ($model->delete()) {
            Msg::set('删除成功');
            $model->updateMenu($id);
            return $this->redirect(['list']);
        }
        Msg::set($model->errors());
    }
}