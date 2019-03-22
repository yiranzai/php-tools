<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:41
 */

namespace Yiranzai\Tools\Tests;

use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Math;

class MathTest extends TestCase
{
    public function testFormatDiv()
    {
        $this->assertSame('1', Math::formatDiv(1, 1, 0));
        $this->assertSame('0.00', Math::formatDiv(1, 0));
    }

    public function testFormatMod()
    {
        $this->assertSame('2', Math::formatMod(5, 3));
        $this->assertSame('0', Math::formatMod(5, 0));
    }

    public function testFormatMul()
    {
        $this->assertSame('1', Math::formatMul(1, 1, 0));
    }

    public function testFormatSub()
    {
        $this->assertSame('0', Math::formatSub(1, 1, 0));
    }

    public function testFormatAdd()
    {
        $this->assertSame('2', Math::formatAdd(1, 1, 0));
    }

    public function testGcdArray()
    {
        $this->assertSame(2, Math::gcdArray([10, 20, 8]));
    }
}
