<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 下午12:38
 */

namespace Yiranzai\Tools\Testss\TestClass;

/**
 * Class Test
 * @package Yiranzai\Tools\Tests
 */
class Test
{
    /**
     * @var string
     */
    public $a = 'abc';

    public function __construct(...$data)
    {
        foreach ($data as $key => $datum) {
            $this->$key = $datum;
        }
    }

    /**
     * @return string
     */
    public function getA(): string
    {
        return $this->a;
    }
}
