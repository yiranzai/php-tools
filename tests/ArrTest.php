<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:41
 */

namespace Yiranzai\Tools\Tests;

use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Arr;

class ArrTest extends TestCase
{
    public function testArrSortByField()
    {
        $a = [
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $b = [
            ['a' => 0, 'b' => 1, 'c' => 2,],
            ['a' => 0, 'b' => 2, 'c' => 1,],
            ['a' => 1, 'b' => 0, 'c' => 2,],
            ['a' => 1, 'b' => 2, 'c' => 0,],
            ['a' => 2, 'b' => 0, 'c' => 1,],
            ['a' => 2, 'b' => 1, 'c' => 0,],
        ];

        $this->assertSame($b, Arr::arrSortByField($a, 'a'));
    }

    public function testArrGroup()
    {
        $a = [
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $c = [
            1 => [
                ['a' => 1, 'b' => 0, 'c' => 2,],
                ['a' => 1, 'b' => 2, 'c' => 0,],
            ],
            0 => [
                ['a' => 0, 'b' => 1, 'c' => 2,],
                ['a' => 0, 'b' => 2, 'c' => 1,],
            ],
            2 => [
                ['a' => 2, 'b' => 0, 'c' => 1,],
                ['a' => 2, 'b' => 1, 'c' => 0,],
            ],
        ];
        $d = [
            1 => ['a' => 1, 'b' => 2, 'c' => 0,],
            0 => ['a' => 0, 'b' => 2, 'c' => 1,],
            2 => ['a' => 2, 'b' => 1, 'c' => 0,],
        ];
        $this->assertSame($c, Arr::arrGroup($a, 'a'));
        $this->assertSame($d, Arr::arrGroup($a, 'a', true));
    }
}
