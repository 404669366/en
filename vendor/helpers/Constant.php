<?php
/**
 * Created by PhpStorm.
 * User: miku
 * Date: 2018/10/16
 * Time: 14:29
 */

namespace vendor\helpers;


class Constant
{
    /**
     * 权限类型
     * @return array
     */
    public static function powerType()
    {
        return [
            1 => '菜单',
            2 => '按钮',
            3 => '接口',
        ];
    }

    /**
     * 后台用户状态
     * @return array
     */
    public static function memberStatus()
    {
        return [
            1 => '启用',
            2 => '禁用',
        ];
    }

    /**
     * 需求业务类型
     * @return array
     */
    public static function amendType()
    {
        return [
            1 => '寻找场地',
            2 => '寻找投资',
            3 => '购买电桩',
            4 => '购买电站',
            5 => '业务咨询',
        ];
    }

    /**
     * 需求业务状态
     * @return array
     */
    public static function amendStatus()
    {
        return [
            1 => '待跟踪',
            2 => '已联系',
            3 => '已处理',
            4 => '删除',
        ];
    }

    /**
     * 轮播图间隔
     * @return int
     */
    public static function broInterval()
    {
        return 5;
    }

    /**
     * 返回首页的配置属性
     * @return array
     */
    public static function getNavIndex()
    {
        return [
            'name' => '首页',
            'url' => 'http://' . $_SERVER['SERVER_NAME'],
            'refresh' => 0,
            'title' => '新能源_充电桩_充电桩_充电桩场地_充电桩投资_信息咨询平台_四川亿能_四川亿能科技有限公司',
            'keywords' => '新能源，充电桩，充电站，充电桩场地，充电桩投资，信息咨询平台，四川亿能，四川亿能科技有限公司',
            'description' => '新能源 充电桩场地 充电桩投资 信息咨询平台 四川亿能 四川亿能科技有限公司',
            'sort' => 0,
        ];
    }
}