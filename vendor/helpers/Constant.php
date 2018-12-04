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
    public static function getBasisStatus()
    {
        return [
            '0' => '待认领',
            '1' => '已认领',
            '2' => '已确认',
            '3' => '已放弃',
        ];
    }

    /**
     * 获取真实场地状态
     * @param array $keys
     * @return array
     */
    public static function getFieldStatus($keys = [])
    {
        $status = [
            '0' => '评分中',
            '1' => '评分通过',
            '2' => '评分不通过',
            '3' => '评分后放弃',
            '4' => '一审中',

            '5' => '一审通过',
            '6' => '一审不通过',
            '7' => '一审后放弃',
            '8' => '场地信息备案成功',
            '9' => '场地信息备案失败',
            '10' => '二审中',
            '11' => '二审通过',
            '12' => '二审不通过',
            '13' => '二审后放弃',
            '14' => '三审中',
            '15' => '三审通过',
            '16' => '三审不通过',
            '17' => '三审后放弃',
            '18' => '四审中',
            '19' => '四审通过',
            '20' => '四审不通过',
        ];
        if ($keys && is_array($keys)) {
            $new = [];
            foreach ($keys as $v) {
                if (isset($status[$v])) {
                    $new[$v] = $status[$v];
                }
            }
            return $new;
        }
        return $status;
    }

    /**
     * 返回前台展示状态
     * @return array
     */
    public static function getShowStatus()
    {
        return [
            15, 19
        ];
    }

    /**
     * 场地类型
     * @return array
     */
    public static function getFieldType()
    {
        return [
            '0' => '合伙人上传场地',
            '1' => '专员上传场地'
        ];
    }

    /**
     * 意向状态
     * @return array
     */
    public static function getIntentionStatus()
    {
        return [
            '0' => '待确认',
            '1' => '已放弃',
            '2' => '待审核',
            '3' => '审核通过',
            '4' => '审核不通过',
        ];
    }

    /**
     * 合伙人状态
     * @return array
     */
    public static function getCobberStatus()
    {
        return [
            0 => '普通合伙人待审核',
            1 => '普通合伙人审核通过',
            2 => '普通合伙人审核不通过',
            3 => '正式合伙人待审核',
            4 => '正式合伙人审核通过',
            5 => '正式合伙人审核不通过',
        ];
    }

    /**
     * 合伙人类型
     * @return array
     */
    public static function getCobberType()
    {
        return [
            0 => '普通用户',
            1 => '普通合伙人',
            2 => '正式合伙人',
        ];
    }

    /**
     * 返回银行类型
     * @return array
     */
    public static function getBankType()
    {
        return [
            1 => '中国银行',
            2 => '中国农业银行',
            3 => '中国工商银行',
            4 => '中国交通银行',
            5 => '中国招商银行',
            6 => '中国建设银行',
            7 => '中国民生银行',
            8 => '中国兴业银行',
            9 => '中国光大银行',
            10 => '中国邮政储蓄银行',
        ];
    }
}