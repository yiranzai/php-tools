<?php


namespace Yiranzai\Tools;

/**
 * Class Zval
 * @package Yiranzai\Tools
 */
class Zval
{
    /**
     * Determine if two variables have a reference relationship
     *
     * @param $left
     * @param $right
     * @return bool
     */
    public static function isRef(&$left, &$right): bool
    {
        $temp = $left;
        if (is_object($left) || is_array($left)) {
            $left  = 'test';
            $isRef = $right === 'test';
            $left  = $temp;
        } else {
            $left  = [];
            $isRef = $right === [];
            $left  = $temp;
        }
        return $isRef;
    }
}
