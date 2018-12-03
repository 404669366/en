<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/23
 * Time: 9:50
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;
use vendor\en\BasisField;
use vendor\en\Follow;

class UserController extends CommonController
{
    /**
     * 用户中心
     * @return string
     */
    public function actionUser()
    {
        return $this->render('user', ['follow' => Follow::getFollow(\Yii::$app->user->id)]);
    }

    /**
     * 修改密码
     * @return string
     */
    public function actionUpdate()
    {
        return $this->render('update');
    }

    /**
     * 基础场地
     * @return string
     */
    public function actionBasisField()
    {
        return $this->render('basis', ['basis' => BasisField::getBasisData()]);
    }
}