<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:02
 */

namespace Yiranzai\Tools;

class Math
{

    /**
     * 四舍五入 格式化除法
     * @param     $divisor
     * @param     $divided
     * @param int $scale
     * @return int|string
     */
    public static function formatDiv($divisor, $divided, int $scale = 2)
    {
        if (empty((int)$divided)) {
            return sprintf('%.' . $scale . 'f', 0);
        }
        return $scale === 0 ?
            bcdiv($divisor, $divided) :
            sprintf('%.' . $scale . 'f', bcdiv($divisor, $divided, $scale + 1));
    }


    /**
     * 四舍五入 格式化取余（模运算）
     * @param $leftOperand
     * @param $rightOperand
     * @return int|string
     */
    public static function formatMod($leftOperand, $rightOperand)
    {
        if (empty((int)$rightOperand)) {
            return '0';
        }
        return bcmod($leftOperand, $rightOperand);
    }


    /**
     * 四舍五入 格式化乘法
     * @param     $leftOperand
     * @param     $rightOperand
     * @param int $scale
     * @return int|string
     */
    public static function formatMul($leftOperand, $rightOperand, int $scale = 2)
    {
        return $scale === 0 ?
            bcmul($leftOperand, $rightOperand) :
            sprintf('%.' . $scale . 'f', bcmul($leftOperand, $rightOperand, $scale + 1));
    }


    /**
     * 四舍五入 格式化减法
     * @param     $leftOperand
     * @param     $rightOperand
     * @param int $scale
     * @return int|string
     */
    public static function formatSub($leftOperand, $rightOperand, int $scale = 2)
    {
        return $scale === 0 ?
            bcsub($leftOperand, $rightOperand) :
            sprintf('%.' . $scale . 'f', bcsub($leftOperand, $rightOperand, $scale + 1));
    }


    /**
     *  四舍五入 格式化加法
     * @param     $leftOperand
     * @param     $rightOperand
     * @param int $scale
     * @return int|string
     */
    public static function formatAdd($leftOperand, $rightOperand, int $scale = 2)
    {
        return $scale === 0 ?
            bcadd($leftOperand, $rightOperand) :
            sprintf('%.' . $scale . 'f', bcadd($leftOperand, $rightOperand, $scale + 1));
    }

    /**
     * 求两个数的最大公约数
     *
     * @param $a
     * @param $b
     * @return int
     */
    public static function gcd(int $a, int $b): int
    {
        if ($a === 0 || $b === 0) {
            return abs(max(abs($a), abs($b)));
        }

        $r = $a % $b;
        return ($r !== 0) ?
            self::gcd($b, $r) :
            abs($b);
    }

    /**
     * 求一个数组的最大公约数
     *
     * @param array $array
     * @param int   $a
     * @return int
     */
    public static function gcdArray(array $array, $a = 0): int
    {
        $b = array_pop($array);
        return ($b === null) ?
            (int)$a :
            self::gcdArray($array, self::gcd($a, $b));
    }
}
