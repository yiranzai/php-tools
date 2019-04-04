<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午10:59
 */

namespace Yiranzai\Tools;

use ArrayAccess;
use Exception;

class Tools
{
    /**
     * 转化内存信息
     * @param      $bytes
     * @param bool $binaryPrefix
     * @return string
     */
    public static function getNiceFileSize(int $bytes, bool $binaryPrefix = true): string
    {
        if ($binaryPrefix) {
            $unit = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB');
            if ($bytes === 0) {
                return '0 ' . $unit[0];
            }
            return @round($bytes / (1024 ** ($i = floor(log($bytes, 1024)))), 2) . ' ' . ($unit[(int)$i] ?? 'B');
        }

        $unit = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        if ($bytes === 0) {
            return '0 ' . $unit[0];
        }
        return @round($bytes / (1000 ** ($i = floor(log($bytes, 1000)))), 2) . ' ' . ($unit[(int)$i] ?? 'B');
    }

    /**
     * 调用对象的方法
     * @param object $object
     * @param string $func
     * @param array  $params
     * @param null   $default
     * @return mixed|null
     */
    public static function callFunc($object, $func, array $params = [], $default = null)
    {
        if (is_object($object) && method_exists($object, $func)) {
            return call_user_func_array([$object, $func], $params);
        }
        return $default;
    }

    /**
     * 获取一个对象或者一个数组的属性
     *
     * @param            $iterator
     * @param mixed      $key
     * @param mixed|null $default
     * @return mixed
     * @throws Exception
     */
    public static function iteratorGet($iterator, $key, $default = null)
    {
        if (empty($iterator)) {
            if ($default instanceof Exception) {
                throw $default;
            }

            return $default;
        }

        if (is_object($iterator)) {
            if (!method_exists($iterator, $key)) {
                if ($iterator instanceof ArrayAccess) {
                    return self::arrGet($iterator, $key, $default);
                }
                return self::objectGet($iterator, $key, $default);
            }
            //  对象获取
            return self::objectGet($iterator, $key, $default);
        }

        //  数组获取
        return self::arrGet($iterator, $key, $default);
    }

    /**
     * 获取数组中的某个元素
     * @param array|mixed $arr     数组
     * @param mixed       $key     下标
     * @param null|mixed  $default 默认值
     * @return mixed|null   如果存在指定元素则返回元素，否则返回默认值
     * @throws Exception
     */
    public static function arrGet($arr, $key, $default = null)
    {
        $isDefault = false;

        if (empty($arr) || (empty($key) && 0 !== $key)) {
            $isDefault = true;
        } elseif (!isset($arr[$key])) {
            $isDefault = true;
        }

        if ($isDefault) {
            if ($default instanceof Exception) {
                throw $default;
            }
            return $default;
        }

        return $arr[$key];
    }

    /**
     * 获取对象中的某个元素
     * @param object     $json    json对象
     * @param string     $key     下标
     * @param null|mixed $default 默认值
     * @return mixed|null 如果存在指定元素则返回该元素，否则返回默认值
     * @throws Exception
     */
    public static function objectGet($json, $key, $default = null)
    {
        $isDefault = false;

        if (empty($json) || empty($key)) {
            $isDefault = true;
        } elseif (!isset($json->{$key})) {
            $isDefault = true;
        }

        if ($isDefault) {
            if ($default instanceof Exception) {
                throw $default;
            }

            return $default;
        }

        return $json->{$key};
    }
}
