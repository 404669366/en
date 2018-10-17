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
        Menu::setNow('About us');
        return $this->render('about');
    }

    public function actionService()
    {
        Menu::setNow('Service');
        return $this->render('service');
    }

    public function actionGallery()
    {
        Menu::setNow('Gallery');
        return $this->render('gallery');
    }

    public function actionProperties()
    {
        Menu::setNow('Properties');
        return $this->render('properties');
    }

    public function actionContact()
    {
        Menu::setNow('Contact');
        return $this->render('contact');
    }
}