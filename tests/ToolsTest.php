<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:41
 */

namespace Yiranzai\Tools\Tests;

use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Tests\TestClass\ArrayAccessTest;
use Yiranzai\Tools\Testss\TestClass\Test;
use Yiranzai\Tools\Tools;

/**
 * Class ToolsTest
 * @package Yiranzai\Tools\Tests
 */
class ToolsTest extends TestCase
{

    /**
     *
     */
    public function testGetNiceFileSize()
    {
        $this->assertSame('1 MiB', Tools::getNiceFileSize(1024 ** 2));
        $this->assertSame('1 MB', Tools::getNiceFileSize(1000 ** 2, false));

        $this->assertSame('0 B', Tools::getNiceFileSize(0));
        $this->assertSame('0 B', Tools::getNiceFileSize(0, false));
    }

    /**
     *
     */
    public function testCallFunc()
    {
        $this->assertSame('abc', Tools::callFunc(new Test(), 'getA'));
        $this->assertNull(Tools::callFunc(0, 'getA'));
    }

    /**
     * @throws \Exception
     */
    public function testIteratorGet()
    {
        $this->assertSame('abc', Tools::iteratorGet(new Test(), 'a'));
        $this->assertNull(Tools::iteratorGet(new Test(), 'b'));
        $this->assertNull(Tools::iteratorGet(new Test(), 'getA'));
        $this->assertNull(Tools::iteratorGet(new ArrayAccessTest(), 'a'));
        $this->assertNull(Tools::iteratorGet([], 'test'));


        $test = ['a' => 'a', 'b' => 'b', 0 => 'c'];
        $this->assertSame('a', Tools::iteratorGet($test, 'a'));
        $this->assertSame('c', Tools::iteratorGet($test, 0));
        $this->assertNull(Tools::iteratorGet($test, 'test'));
    }

    /**
     * @throws \Exception
     */
    public function testIteratorGetExceptionOne()
    {
        $this->expectException(\Exception::class);
        Tools::iteratorGet(new Test(), 'b', new \Exception());
    }

    /**
     * @throws \Exception
     */
    public function testIteratorGetExceptionTwo()
    {
        $test = ['a' => 'a', 'b' => 'b', 0 => 'c'];
        $this->expectException(\Exception::class);
        Tools::iteratorGet($test, 1, new \Exception());
    }

    /**
     * @throws \Exception
     */
    public function testIteratorGetExceptionThree()
    {
        $this->expectException(\Exception::class);
        Tools::iteratorGet(null, 'b', new \Exception());
    }

    /**
     * @throws \Exception
     */
    public function testArrGet()
    {
        $test = ['a' => 'a', 'b' => 'b', 0 => 'c'];
        $this->assertSame('a', Tools::arrGet($test, 'a'));
        $this->assertSame('c', Tools::arrGet($test, 0));
        $this->assertNull(Tools::arrGet($test, 'test'));
        $this->assertNull(Tools::arrGet([], 'test'));
    }

    /**
     * @throws \Exception
     */
    public function testArrGetException()
    {
        $this->expectException(\Exception::class);
        $test = ['a' => 'a', 'b' => 'b', 0 => 'c'];
        Tools::arrGet($test, 1, new \Exception());
    }

    /**
     * @throws \Exception
     */
    public function testObjectGet()
    {
        $this->assertSame('abc', Tools::objectGet(new Test(), 'a'));
        $this->assertNull(Tools::objectGet(new Test(), 'b'));
        $this->assertNull(Tools::objectGet(null, 'b'));
    }

    /**
     * @throws \Exception
     */
    public function testObjectGetException()
    {
        $this->expectException(\Exception::class);
        Tools::objectGet(new Test(), 'b', new \Exception());
    }
}
