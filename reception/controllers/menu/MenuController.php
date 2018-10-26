<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/17
 * Time: 16:29
 */

namespace app\controllers\menu;


use app\controllers\basis\BasisController;
use vendor\en\EnNavBase;
use vendor\helpers\Menu;

class MenuController extends BasisController
{
    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        EnNavBase::setNow('首页');
        return $this->render('index');
    }

    public function actionAbout()
    {
        EnNavBase::setNow('产品简介');
        return $this->render('about');
    }

    public function actionService()
    {
        EnNavBase::setNow('开放平台');
        return $this->render('service');
    }

    public function actionGallery()
    {
        EnNavBase::setNow('成功案例');
        return $this->render('gallery');
    }

    public function actionProperties()
    {
        EnNavBase::setNow('需求设计');
        return $this->render('properties');
    }

    public function actionContact()
    {
        EnNavBase::setNow('联系我们');
        return $this->render('contact');
    }
}