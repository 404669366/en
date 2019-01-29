<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/16
 * Time: 10:05
 */

namespace app\controllers\job;


use app\controllers\basis\CommonController;
use vendor\en\Job;
use vendor\en\Power;
use vendor\helpers\Msg;

class JobController extends CommonController
{
    /**
     * 职位列表页渲染
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 职位列表页数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(Job::getPageData());
    }

    /**
     * 新增职位
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Job();
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['powers']) && $post['powers']) {
                $post['powers'] = implode(',', $post['powers']);
            }
            if ($model->load(['Job' => $post]) && $model->validate() && $model->save()) {
                $model->updateRule();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('add', [
            'tops' => $model::getTopJobs(),
            'powers' => json_encode(Power::getPowerTree()),
        ]);
    }

    /**
     * 修改职位
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Job::findOne($id);
        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if (isset($post['powers']) && $post['powers']) {
                $post['powers'] = implode(',', $post['powers']);
            }
            if ($model->load(['Job' => $post]) && $model->validate() && $model->save()) {
                $model->updateRule();
                Msg::set('保存成功');
                return $this->redirect(['list']);
            }
            Msg::set($model->errors());
        }
        return $this->render('edit', [
            'model' => $model,
            'tops' => $model::getTopJobs($id),
            'powers' => json_encode(Power::getPowerTree()),
        ]);
    }

    /**
     * 删除职位
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        $model = Job::findOne($id);
        Msg::set('删除失败');
        if ($model) {
            $model->updateRule($id);
            $model->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}