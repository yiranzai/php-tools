<?php


namespace Yiranzai\Tools;

/**
 * Class Zval
 * @package Yiranzai\Tools
 */
class Zval
{
    /**
     * @param $var
     * @return bool
     */
    public static function isRef($var): bool
    {
        $info = self::getZvalRefCountInfo($var);
        return (boolean)$info['is_ref'];
    }

    /**
     * @param $var
     * @return mixed
     */
    public static function getRefCount($var)
    {
        $info = self::getZvalRefCountInfo($var);
        return $info['refcount'];
    }

    /**
     * @param $var
     * @return bool
     */
    public static function canCopyOnWrite($var): bool
    {
        $info = self::getZvalRefCountInfo($var);
        return $info['is_ref'] === 0;
    }

    /**
     * @param $var
     * @return bool
     */
    public static function canReferenceWithoutCopy($var): bool
    {
        $info = self::getZvalRefCountInfo($var);
        return $info['is_ref'] === 1 || $info['refcount'] === 1;
    }

    /**
     * @param $var
     * @return array
     */
    public static function getZvalRefCountInfo($var): array
    {
        ob_start();
        xdebug_debug_zval($var);
        $info = ob_get_clean();
        preg_match('(: \(refcount=(\d+), is_ref=(\d+)\))', $info, $match);
        return array('refcount' => (int)$match[1], 'is_ref' => (int)$match[2]);
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    public static function isRefto(&$a, &$b): bool
    {
        if ($a !== $b) {
            return false;
        }
        $t = $a;
        if ($r = ($b === ($a = 1))) {
            $r = ($b === ($a = 0));
        }
        $a = $t;
        return $r;
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    public static function isReferenceOf(&$a, &$b): bool
    {
        if (!self::isRef('a') || self::getZvalRefCountInfo('a') !== self::getZvalRefCountInfo('b')) {
            return false;
        }
        $tmp = $a;
        if (is_object($a) || is_array($a)) {
            $a   = 'test';
            $ret = $b === 'test';
            $a   = $tmp;
        } else {
            $a   = [];
            $ret = $b === [];
            $a   = $tmp;
        }
        return $ret;
    }
}
