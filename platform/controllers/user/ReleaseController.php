<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/12/3
 * Time: 19:35
 */

namespace app\controllers\user;


use app\controllers\basis\CommonController;

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
     * 发布真实场地
     * @return string
     */
    public function actionRelease()
    {
        return $this->render('release');
    }
}