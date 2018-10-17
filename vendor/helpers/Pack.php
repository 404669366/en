<?php
/**
 * Created by PhpStorm.
 * User: 40466
 * Date: 2018/6/1
 * Time: 11:13
 */

namespace vendor\helpers;
class Pack
{
    /**
     * 封包
     * @param $code
     * @param $msg
     * @return string
     */
    public static function toPack($code, $msg)
    {
        $code = self::getUnsigned($code);
        $msg = self::getStrAddNull($msg);
        $length = self::getUnsigned(8 + strlen($msg));
        return $length . $code . $msg;
    }

    /**
     * 解包
     * @param $str
     * @param array $rules
     * @return array
     */
    public static function unPack($str, $rules = [])
    {
        $data = [];
        if ($rules) {
            foreach ($rules as $v) {
                if ($v['length'] !== false) {
                    $now = substr($str, $v['start'], $v['length']);
                } else {
                    $now = substr($str, $v['start']);
                }
                if ($v['key'] == 'i') {
                    $data[$v['name']] = unpack($v['key'], $now)[1];
                }
                if ($v['key'] == 'I') {
                    $data[$v['name']] = unpack($v['key'], $now)[1];
                }
                if ($v['key'] == 'a') {
                    $data[$v['name']] = unpack($v['key'] . strlen($now), $now)[1];
                }
                if ($v['key'] == 'A') {
                    $data[$v['name']] = unpack($v['key'] . strlen($now), $now)[1];
                }
            }
        }
        return $data;
    }

    /**
     * (4字节)
     * 最大值2147483647
     * 最小值-2147483648
     * @param $int
     * @return string
     */
    public static function getInt($int)
    {
        $int = pack('i', $int);
        return $int;
    }

    /**
     * 获取无符号整型(4字节)
     * 最大值4294967295
     * 最小值0
     * @param $int
     * @return string
     */
    public static function getUnsigned($int)
    {
        $int = pack('I', $int);
        return $int;
    }

    /**
     * 获取字符串(null填充)
     * @param $str
     * @param int $length
     * @return string
     */
    public static function getStrAddNull($str, $length = 0)
    {
        $length = $length ? $length : strlen($str);
        $str = pack('a' . $length, $str);
        return $str;
    }

    /**
     * 获取字符串(空格填充)
     * @param $str
     * @param int $length
     * @return string
     */
    public static function getStrAddSpace($str, $length = 0)
    {
        $length = $length ? $length : strlen($str);
        $str = pack('A' . $length, $str);
        return $str;
    }
}