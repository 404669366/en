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
use vendor\en\SectionRule;
use vendor\en\SectionType;
use vendor\helpers\Msg;
use yii\db\Exception;

class SectionTypeController extends CommonController
{
    /**
     * 电桩收费配置列表页面
     * @return string
     */
    public function actionList()
    {
        return $this->render('list');
    }

    /**
     * 电桩收费配置列表数据
     * @return string
     */
    public function actionData()
    {
        return $this->rTableData(SectionType::getPageData());
    }

    /**
     * 添加电桩收费配置页面
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        if (\Yii::$app->request->isPost) {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $model = new SectionType();
                $data = \Yii::$app->request->post();
                $model->name = $data['name'];
                $model->intro = $data['intro'];
                $model->created = time();
                if ($model->save()) {
                    $rules = json_decode($data['rules'], true);
                    foreach ($rules as &$v) {
                        $v['section_type_id'] = $model->id;
                    }
                    \Yii::$app->db->createCommand()->batchInsert(
                        SectionRule::tableName(),
                        ['start', 'end', 'electrovalence', 'service', 'section_type_id'],
                        $rules
                    )->execute();
                    $transaction->commit();
                    Msg::set('添加成功');
                    return $this->redirect(['list']);
                } else {
                    throw new Exception($model->errors());
                }
            } catch (Exception $e) {
                $transaction->rollBack();
                Msg::set($e->getMessage());
            }
        }
        return $this->render('add');
    }

    /**
     * 电桩收费配置详情页面
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = SectionType::findOne($id);
        $info = SectionRule::find()
            ->where(['section_type_id' => $id])
            ->select(['start', 'end', 'electrovalence', 'service', 'section_type_id'])
            ->asArray()
            ->all();
        if (\Yii::$app->request->isPost) {
            $transaction = \Yii::$app->db->beginTransaction();
           try{
               $data = \Yii::$app->request->post();
               $model->name = $data['name'];
               $model->intro = $data['intro'];
               if ($model->save()) {
                   $rules = json_decode($data['rules'], true);
                   if ($rules != $info){
                       (new SectionRule())->deleteAll(['section_type_id' => $id]);
                       \Yii::$app->db->createCommand()->batchInsert(
                           SectionRule::tableName(),
                           ['start', 'end', 'electrovalence', 'service', 'section_type_id'],
                           $rules
                       )->execute();
                   }
                   $transaction->commit();
                   Msg::set('修改成功');
                   return $this->redirect(['list']);
               } else {
                   throw new Exception($model->errors());
               }
           }catch (Exception $e){
               $transaction->rollBack();
               Msg::set($e->getMessage());
           }
        }
        return $this->render('edit', ['model' => $model, 'info' => $info]);
    }

    /**
     * 删除电桩收费配置
     * @param $id
     * @return \yii\web\Response
     */
    public function actionDel($id)
    {
        Msg::set('已绑定电桩不能删除');
        if (!Electricize::find()->where(['section_id' => $id])->count()) {
            (new SectionRule())->deleteAll(['section_type_id' => $id]);
            SectionType::findOne($id)->delete();
            Msg::set('删除成功');
        }
        return $this->redirect(['list']);
    }
}