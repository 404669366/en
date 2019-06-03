<?php

return [
    'entryName' => 'EnOperate',
    'msgFontSize' => '0.42rem',
    'defaultRoute' => 'user/user/user',
    'DB' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=transaction',
        'username' => 'root',
        'password' => 'root',
        'charset' => 'utf8',
    ],
    'Redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => '127.0.0.1',
        'password' => '',
        'port' => 6379,
        'database' => 0,
    ],
    'AliOss' => [
        'url' => 'https://ascasc.oss-cn-hangzhou.aliyuncs.com/',
        'accessKeyId' => 'LTAI9s99tZC58pzG',
        'accessKeySecret' => 'usmBiqxU7jMYV9Gz7qSToq8J1Q8lWb',
        'endPoint' => 'oss-cn-hangzhou.aliyuncs.com',
        'bucket' => 'ascasc',
    ],
];
