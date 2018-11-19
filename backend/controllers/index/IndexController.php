<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/9/21
 * Time: 10:19
 */

namespace app\controllers\index;

use app\controllers\basis\CommonController;
use vendor\helpers\redis;

class IndexController extends CommonController
{
    /**
     * 框架菜单
     * @return string
     */
    public function actionMenu()
    {
        $this->layout = false;
        $user = \Yii::$app->user->getIdentity() ? \Yii::$app->user->getIdentity() : '';
        $data = [
            'username' => $user ? $user->username : '',
            'menus' => redis::app()->hGet('BackstageMenu', $user ? $user->job_id : 0),
        ];
        return $this->render('menu', ['data' => $data]);
    }

    /**
     * 默认首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}