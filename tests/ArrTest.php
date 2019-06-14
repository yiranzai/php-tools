<?php
/**
 * Created by PhpStorm.
 * User: yiranzai
 * Date: 19-3-22
 * Time: 上午11:41
 */

namespace Yiranzai\Tools\Tests;

use Exception;
use phpDocumentor\Reflection\Types\Static_;
use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Arr;

/**
 * Class ArrTest
 * @package Yiranzai\Tools\Tests
 */
class ArrTest extends TestCase
{
    /**
     *
     */
    public function testArrSortByField(): void
    {
        $a = [
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $b = [
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $c = [
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $d = [
            ['a' => 0, 'b' => 1, 'c' => 2],
            ['a' => 0, 'b' => 2, 'c' => 1],
            ['a' => 1, 'b' => 0, 'c' => 2],
            ['a' => 1, 'b' => 2, 'c' => 0],
            ['a' => 2, 'b' => 0, 'c' => 1],
            ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $this->assertSame($b, Arr::arrSortByField($a, 'a'));

        $this->assertSame($c, array_values(Arr::sortBy($a, static function ($value) {
            return $value['a'];
        })));

        $this->assertSame($d, array_values(Arr::sortBy($a, static function ($value) {
            return [$value['a'], $value['b']];
        })));
    }

    /**
     * @throws Exception
     */
    public function testArrGroup(): void
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
                ['a' => 1, 'b' => 0, 'c' => 2],
                ['a' => 1, 'b' => 2, 'c' => 0],
            ],
            0 => [
                ['a' => 0, 'b' => 1, 'c' => 2],
                ['a' => 0, 'b' => 2, 'c' => 1],
            ],
            2 => [
                ['a' => 2, 'b' => 0, 'c' => 1],
                ['a' => 2, 'b' => 1, 'c' => 0],
            ],
        ];
        $d = [
            1 => ['a' => 1, 'b' => 2, 'c' => 0],
            0 => ['a' => 0, 'b' => 2, 'c' => 1],
            2 => ['a' => 2, 'b' => 1, 'c' => 0],
        ];
        $this->assertSame($c, Arr::arrGroup($a, 'a'));
        $this->assertSame($d, Arr::arrGroup($a, 'a', true));
    }

    /**
     *
     */
    public function testSort(): void
    {
        $arr = [5, 8, 9, 5, 2, 5, 6, 2, 14, 5, 6, 2, 2, 12, 23, 3];
        $this->assertSame(Arr::heapSort($arr), Arr::quickSort($arr));
        $this->assertSame(Arr::mergeSort($arr), Arr::quickSort($arr));
        $this->assertSame(Arr::heapSort($arr), Arr::mergeSort($arr));
    }

    /**
     * 测试 PHP 提取多维数组指定一列的方法
     * @Author    phperali@gmail.com
     */
    public function testgetArrKeysColumnByKey(): void
    {
        $arr = array(
            '0' => array('id' => 100, 'name' => 'a1'),
            '1' => array('id' => 101, 'name' => 'a2'),
            '2' => array('id' => 102, 'name' => 'a3'),
            '3' => array('id' => 103, 'name' => 'a4'),
            '4' => array('id' => 104, 'name' => 'a5'),
        );
        $name = array('a1', 'a2', 'a3', 'a4', 'a5');
        $this->assertSame($name, Arr::getArrKeysColumnByKey($arr, 'name'));
    }
}
