<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/26
 * Time: 15:03
 */
require_once('../workerman/Autoloader.php');
$http_worker = new \Workerman\Worker("websocket://0.0.0.0:4046");

$http_worker->count = 4;
$http_worker->onMessage = function ($connection, $data) {
    $connection->send($connection->worker->id);
};
\Workerman\Worker::runAll();