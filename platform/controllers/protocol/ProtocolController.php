<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/11/21
 * Time: 17:59
 */

namespace app\controllers\protocol;


use app\controllers\basis\BasisController;

class ProtocolController extends BasisController
{
    public function actionProtocol()
    {
        return $this->render('protocol');
    }

    public function actionUse()
    {
        return $this->render('useProtocol');
    }

    public function actionService()
    {
        return $this->render('serviceProtocol');
    }
}