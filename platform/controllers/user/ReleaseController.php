<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/3
 * Time: 19:35
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\BasisField;
use vendor\helpers\Msg;
use vendor\helpers\redis;

class ReleaseController extends CommonController
{
    /**
     * 发布基础场地
     * @return string
     */
    public function actionReleaseBasis()
    {
        return $this->render('releaseBasis');
    }

    /**
     * 发布基础场地
     * @return string|\yii\web\Response
     */
    public function actionAddBasis()
    {
        Msg::set('错误操作');
        if (\Yii::$app->request->isPost) {
            $data = \Yii::$app->request->post();
            if (!isset($data['area_id']) || !$data['area_id']) {
                return $this->render('releaseBasis', [], '请选择地域');
            }
            if (!isset($data['address']) || !$data['address']) {
                return $this->render('releaseBasis', [], '请填写详细地址');
            }
            if (!isset($data['intro']) || !$data['intro']) {
                return $this->render('releaseBasis', [], '请填写场地描述');
            }
            $user_id = \Yii::$app->user->id;
            if (!$user_id) {
                return $this->render('releaseBasis', [], '系统错误');
            }
            $model = new BasisField();
            $model->user_id = $user_id;
            $model->created = time();
            if ($model->load(['BasisField' => $data]) && $model->validate() && $model->save()) {
                redis::app()->rPush('BackendBasisField', $model->id);
                return $this->redirect(['/user/user/basis-field'], '发布成功');
            }
            Msg::set('发布失败', 'PopupMsg');
        }
        return $this->render('releaseBasis');
    }

    /**
     * 发布真实场地
     * @return string
     */
    public function actionRelease()
    {
        return $this->render('release');
    }
}