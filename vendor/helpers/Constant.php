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
            'title' => '新能源_充电桩_充电站_场地_投资_建桩_建站_投资预算_四川亿能_四川亿能科技有限公司',
            'keywords' => '新能源，充电桩，充电站，场地，投资，建桩，建站，投资预算，四川亿能，四川亿能科技有限公司',
            'description' => '新能源 充电桩 充电站 场地 投资 建桩 建站 投资预算 四川亿能 四川亿能科技有限公司',
            'sort' => 0,
        ];
    }

    /**
     * 返回预测配置参数
     * @return array
     */
    public static function getBudget()
    {
        return [
            'yearDay' => 330,//年计算日
            'field' => 0.2,//场地分成比例
            'roof' => 0.15,//平台分成比例
            'subsidy' => 0.3,//政府补贴比例
            'price' => 0.62,//基础电价
            'safe' => 350,//保险费
            'tax' => 0.84
        ];
    }

    /**基础场地状态
     *
     * @return array
     */
    public static function basisStatus()
    {
        return [
            '0' => '待认领',
            '1' => '已认领',
            '2' => '已确认',
            '3' => '已放弃',
        ];
    }
}