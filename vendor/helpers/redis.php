<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/6/29
 * Time: 15:49
 */

namespace vendor\helpers;

class redis extends \Redis
{
    private static $app;

    /**
     * @return redis
     */
    public static function app()
    {
        if (!self::$app) {
            $config = \Yii::$app->components['redis'];
            try {
                $redis = new self();
                $redis->connect($config['hostname'], $config['port']);
                if (isset($config['password'])) {
                    $redis->auth($config['password']);
                }
                self::$app = $redis;
            } catch (\Exception $e) {
                exit('Redis服务器链接错误或未开启');
            }
        }
        return self::$app;
    }

    /**
     * 添加/修改分页单条数据
     * @param string $tableName
     * @param string $key
     * @param $data
     */
    public function setPageOne($tableName = '', $key = '', $data)
    {
        if (!self::app()->hGet($tableName, $key)) {
            $id = self::app()->get($tableName . 'Id');
            $id = $id ?: 0;
            self::app()->zAdd($tableName . 'PageInfo', $id + 1, $key);
            self::app()->set($tableName . 'Id', $id + 1);
        }
        self::app()->hSet($tableName, $key, $data);
    }

    /**
     * 获取单条分页数据
     * @param string $tableName
     * @param string $key
     * @return string
     */
    public function getPageOne($tableName = '', $key = '')
    {
       return self::app()->hGet($tableName, $key);
    }

    /**
     * 删除分页单条数据
     * @param string $tableName
     * @param string $key
     */
    public function delPageOne($tableName = '', $key = '')
    {
        self::app()->zDelete($tableName . 'PageInfo', $key);
        self::app()->hDel($tableName, $key);
    }

    /**
     * 获取分页数据
     * @param string $tableName
     * @param int $start
     * @param int $length
     * @param string $sort
     * @return array
     */
    public function getPageData($tableName = '', $start = 0, $length = 10, $sort = 'asc')
    {
        $nos = [];
        $data = [];
        if ($sort == 'asc') {
            $nos = self::app()->zRange($tableName . 'PageInfo', $start, ($start + $length - 1));
        }
        if ($sort == 'desc') {
            $nos = self::app()->zRevRange($tableName . 'PageInfo', $start, ($start + $length - 1));
        }
        if ($nos) {
            $data = self::app()->hMGet($tableName, $nos);
        }
        return $data;
    }

    /**
     * 删除分页表
     * @param string $tableName
     */
    public function delPageData($tableName = '')
    {
        self::app()->delete($tableName . 'Id', $tableName . 'PageInfo', $tableName);
    }
}