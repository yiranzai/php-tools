<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:21
 */

namespace Yiranzai\Tools;

use Exception;

/**
 * Class Arr
 * @package Yiranzai\Tools
 */
class Arr
{
    /**
     * 使用给定的回调对数组进行排序并保留原始键。
     * @param array    $array
     * @param callable $callback
     * @param int      $options
     * @param bool     $descending
     * @return array
     */
    public static function sortBy(array $array, callable $callback, $options = SORT_REGULAR, $descending = false): array
    {
        $results = [];

        foreach ($array as $key => $value) {
            $results[$key] = $callback($value, $key);
        }

        $descending ? arsort($results, $options)
            : asort($results, $options);

        foreach (array_keys($results) as $key) {
            $results[$key] = $array[$key];
        }

        return $results;
    }

    /**
     * 二维数组按照某个字段排序
     * @param array $arr   要排序的数组
     * @param mixed $field 要排序的字段
     * @param int   $arg   排序规则
     * @return array
     */
    public static function arrSortByField(array $arr, $field, $arg = SORT_ASC): array
    {
        if (!empty($arr)) {
            foreach ($arr as $v) {
                $sort[] = $v[$field];
            }
            array_multisort($sort, $arg, $arr);
        }
        return $arr;
    }

    /**
     * 数组group by
     * @param array  $arr
     * @param string $field
     * @param bool   $unique
     * @return array
     * @throws Exception
     */
    public static function arrGroup(array $arr, string $field, $unique = false): array
    {
        $group = [];
        foreach ($arr as $item) {
            $groupField = is_array($item) ? Tools::arrGet($item, $field) : Tools::objectGet($item, $field);
            if (empty($groupField) && 0 !== $groupField) {
                continue;
            }
            //  只取其中一个
            if ($unique) {
                $group[$groupField] = $item;
            } else {
                $group[$groupField][] = $item;
            }
        }
        return $group;
    }

    /**
     * @param array $array
     * @return array
     */
    public static function heapSort(array $array = []): array
    {
        $len     = count($array);
        $lastKey = ($len - 1) >> 1;
        //构建一个大顶堆
        for ($i = $lastKey; $i >= 0; $i--) {
            self::maxHeapify($array, $i, $len);
        }
        for ($i = $len - 1; $i > 0; $i--) {
            //将构建好的大顶堆的顶点与最后一个没排序的点交换
            self::swap($array[0], $array[$i]);
            //将剩下的没排序的数据重新构建为一个大顶堆
            self::maxHeapify($array, 0, $i);
        }
        return $array;
    }

    /**
     * @param array $arr
     * @param int   $start
     * @param int   $end
     */
    private static function maxHeapify(&$arr, $start, $end): void
    {
        $son = $start * 2 + 1;
        if ($son >= $end) {
            return;
        }
        if ($son + 1 < $end && $arr[$son] < $arr[$son + 1]) {
            $son++;
        }
        if ($arr[$start] <= $arr[$son]) {
            self::swap($arr[$start], $arr[$son]);
            self::maxHeapify($arr, $son, $end);
        }
    }

    /**
     * @param mixed $a
     * @param mixed $b
     */
    private static function swap(&$a, &$b): void
    {
        $t = $a;
        $a = $b;
        $b = $t;
    }

    /**
     * 不断均分为左右两个数组，然后取出两个数组每个相同位置的值，比较大小，并push到队列中，最后按照 队列，左数组，右数组的顺序来合并
     * 从最小单元开始排序合并，然后返回到上一个大小的单元进行排序合并
     *
     * @param array $array
     * @return array
     */
    public static function mergeSort(array $array): array
    {
        $len = count($array);
        if ($len <= 1) {
            return $array;
        }
        //如果数组长度为奇数，则$m需要等于长度的一半向上补齐整数，偶数则需要等于一半，只有这样array_chunk才能恰好分割为两个长度几乎相同的数组
        $m = ($len + 1) >> 1;
        [$left, $right] = array_chunk($array, $m);
        $left  = self::mergeSort($left);
        $right = self::mergeSort($right);
        $reg   = [];
        while (count($left) && count($right)) {
            if ($left[0] < $right[0]) {
                $reg[] = array_shift($left);
            } else {
                $reg[] = array_shift($right);
            }
        }
        return array_merge($reg, $left, $right);
    }

    /**
     * 每次都取中间的那个数，遍历数组，比它大放右边，比它小放左边
     *
     * @param array $array
     * @return array
     */
    public static function quickSort(array $array): array
    {
        $len = count($array);
        if ($len <= 1) {
            return $array;
        }
        $m      = $len >> 1;
        $mValue = $array[$m];
        $left   = $right = [];
        foreach ($array as $key => $iValue) {
            if ($key === $m) {
                continue;
            }
            if ($iValue < $mValue) {
                $left[] = $iValue;
            } else {
                $right[] = $iValue;
            }
        }
        return array_merge(self::quickSort($left), [$mValue], self::quickSort($right));
    }
}
