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
     * 返回预测配置参数(旧版)
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
            'tax' => 0.84//增值税
        ];
    }

    /**
     * 返回预测配置参数(新版)
     * @return array
     */
    public static function getBudgetNew()
    {
        return [
            'yearDay' => 330,//年计算日
            'raiseRatio' => 0.2,//盈利增值
            'defPrice' => 909.1,//默认功率单价(kw)
            'servers' => 0.6,//服务费
            'price' => 0.62,//基础电价
            'field' => 0.2,//场地分成比例
            'roof' => 0.15,//平台分成比例
            'pLoss' => 0.07,//电损
            'safe' => 350,//保险费
            'tax' => 0.84//增值税
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
            '18' => '融资完成',
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
            15, 18,
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
     * 场地方最高分成比例(返回百分比)
     * @return int
     */
    public static function getFieldMaxRatio()
    {
        return 1;
    }

    /**
     * 融资结束节点(返回百分比)
     * @return int
     */
    public static function getFieldNode()
    {
        return 1;
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

    /**
     * 返回客服电话
     * @return string
     */
    public static function getServiceTel()
    {
        return '18581501718';//吴磊
    }

    /**
     * 返回电桩状态
     * @return array
     */
    public static function getElectricizeStatus()
    {
        return [
            1 => '启用',
            2 => '禁用',
            3 => '故障',
        ];
    }

    /**
     * 返回电桩类型
     * @return array
     */
    public static function getModelType()
    {
        return [
            1 => '慢充',
            2 => '快充',
            3 => '均充',
            4 => '轮充',
        ];
    }

    /**
     * 获取国标
     * @return array
     */
    public static function getModelStandard()
    {
        return [
            1 => '国标2011',
            2 => '国标2015',
        ];
    }

    /**
     * 获取订单在线状态
     * @return array
     */
    public static function getOrderOnlineStatus()
    {
        return [
            0 => '正在启动',
            1 => '启动失败',
            2 => '正在充电',
            3 => '充电结束',
            4 => '异常结束',
        ];
    }

    /**
     * 获取充电订单状态
     * @return array
     */
    public static function getOrderStatus()
    {
        return [
            1 => '启动失败',
            5 => '付款成功',
        ];
    }

    /**
     * 获取故障状态
     * @return array
     */
    public static function getTroubleStatus()
    {
        return [
            0 => 'green',
            1 => 'red',
        ];
    }

    /**
     * 获取信息码状态
     * @return array
     */
    public static function getInfoCode()
    {
        return [
            1 => '未知错误',
            2 => '充电桩已处于充电中',
            3 => '枪口链接异常',
            4 => 'CC1未连接',
            5 => '绝缘检测超时',
            6 => '绝缘检测异常',
            7 => '充电桩暂停服务',
            8 => '充电桩系统故障',
            9 => '辅电不匹配',
            10 => '辅电开启失败',
            11 => '充电启动超时',
            12 => 'BMS通讯握手失败',
            13 => 'BMS通讯设置失败',
            14 => 'BMS参数异常',
            15 => '车辆准备就绪超时',
            16 => '接收BMS辨识报文超时',
            17 => '接收电池充电参数报文超时',
            18 => '接收BMS完成充电准备报文超时',
            19 => '接收电池充电状态报文超时',
            20 => '接收电池充电需求报文超时',
            21 => '接收BMS终止充电报文超时',
            22 => '接收BMS充电统计报文超时',
            23 => 'BMS温度过高异常',
            24 => '单体电压过高异常',
            25 => '需求电流异常',
            26 => '紧急停机',
            27 => '控制板通讯异常',
            28 => '电表通讯异常',
            29 => '充电电压异常',
            30 => '充电电流异常',
            31 => '电表电流异常增大',
            32 => '电表电流异常减小',
            33 => 'BMS单体动力蓄电池电压异常',
            34 => 'BMS整车动力蓄电池状态异常',
            35 => 'BMS动力蓄电池电流异常',
            36 => 'BMS动力蓄电池温度过高',
            37 => 'BMS动力蓄电池绝缘异常',
            38 => 'BMS动力蓄电池输出连接器异常',
            39 => 'BMS其他异常',
            40 => 'BCS上传电压异常',
            41 => '电网电压高',
            42 => '电网电压低',
            43 => '电网频率高',
            44 => '电网频率低',
            45 => '软启失败',
            46 => '输出反接故障',
            47 => '接触器异常',
            48 => '直流过压',
            49 => '直流欠压',
            50 => '模块故障',
            51 => '模块通信异常',
            52 => '模块类型不一致',
            53 => '系统辅源掉电',
            54 => '直流输出断路',
            55 => '进风口过温保护',
            56 => '进风口低温保护',
            57 => '出风口过温保护',
            58 => '群充模块过温',
            59 => '放雷故障',
            60 => '交流接触器异常',
            61 => '后台结束',
        ];
    }

    /**
     * 获取故障码状态
     * @return array
     */
    public static function getTroubleCode()
    {
        return [
            '011' => '散热器过温保护',
            '012' => '电抗器铁芯过温保护',
            '013' => '直流短路保护',
            '014' => '直流过压保护',
            '015' => '直流欠压保护',
            '016' => '直流反接或未接保护',
            '017' => '直流侧断开保护',
            '018' => '直流过流保护',
            '021' => '相序错误保护',
            '022' => 'DSP保护',
            '023' => '整流电压异常保护',
            '024' => '电流过高保护',
            '025' => '电压过高保护',
            '026' => '硬件漏电保护',
            '111' => '防雷器告警',
            '112' => '内部过温异常',
            '113' => '柜体温度过高',
            '114' => '柜体湿度过高',
            '115' => '交流断路器脱扣',
            '116' => '交流电涌保护器状态异常',
            '117' => '控制开关异常',
            '118' => '烟雾传感器状态异常',
            '121' => '严重漏电',
            '122' => '一般漏电',
            '123' => '控制柜环境温度传感器失效',
            '124' => '控制柜环境湿度传感器失效',
            '125' => '电网电压异常',
            '126' => '控制柜环境湿度超限',
            '127' => '控制柜环境温度严重过温',
            '128' => '直流预充接触器回检异常',
            '131' => '直流断路器不能吸合',
            '132' => '系统检查控制器信号异常吸合',
            '133' => '系统检查控制器信号异常断开',
            '134' => '零线接触器吸合失败',
            '135' => '零线接触器断开失败',
            '136' => '柜门打开',
            '137' => '电网频率异常',
            '138' => '一般过载',
            '141' => '严重过载',
            '142' => '电池限流',
            '143' => '逆变器一般过温',
            '144' => '交流三相电不平衡告警',
            '145' => '自检失败告警',
            '146' => '制冷设备失效',
            '211' => '绝缘故障',
            '212' => '输出连接器故障',
            '213' => '连接器故障',
            '214' => '电池组温度过高',
            '215' => '高压继电器故障',
            '216' => '检查点电压检测故障',
            '217' => '电流过大',
            '218' => '电压异常',
            '221' => '充电桩过温故障',
            '222' => '充电桩急停故障',
            '223' => '电能表故障',
            '224' => '硬件PDP故障',
            '225' => 'HMI故障',
            '226' => 'PWM切换故障',
            '227' => '温度传感器故障',
            '228' => '急停报警',
            '231' => '充电枪温度传感器故障',
            '232' => '链接充电枪超时',
            '233' => '接收BMS故障停机',
            '234' => 'PCS与BMS通讯中断',
            '235' => 'PCS与Master通讯中断',
            '236' => 'PCS与单元控制器通讯中断',
            '237' => '交流电流采样失效',
            '238' => '直流电流采样失效',
            '241' => '接收BMS故障停止',
            '242' => '车辆禁止充电',
            '243' => '接触器故障',
            '244' => '监控系统通讯故障',
        ];
    }

    /**
     * 获取充值来源
     * @return array
     */
    public static function getSource()
    {
        return [
            1 => '微信充值',
            2 => '支付宝充值',
        ];
    }
}