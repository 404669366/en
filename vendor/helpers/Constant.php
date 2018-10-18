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
            4 => '业务咨询',
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
}