<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/17
 * Time: 16:29
 */

namespace app\controllers\menu;


use app\controllers\basis\BasisController;
use vendor\helpers\Menu;

class MenuController extends BasisController
{
    /**
     * 首页
     * @return string
     */
    public function actionIndex()
    {
        Menu::setNow('首页');
        return $this->render('index');
    }

    public function actionAbout()
    {
        Menu::setNow('产品简介');
        return $this->render('about');
    }

    public function actionService()
    {
        Menu::setNow('产品展示');
        return $this->render('service');
    }

    public function actionGallery()
    {
        Menu::setNow('成功案例');
        return $this->render('gallery');
    }

    public function actionProperties()
    {
        Menu::setNow('开放平台');
        return $this->render('properties');
    }

    public function actionContact()
    {
        Menu::setNow('联系我们');
        return $this->render('contact');
    }
}