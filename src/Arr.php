<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:21
 */

namespace Yiranzai\Tools;

class Arr
{
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
     * @throws \Exception
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
}
