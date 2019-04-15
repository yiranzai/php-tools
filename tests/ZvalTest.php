<?php


namespace Yiranzai\Tools\Tests;

use PHPUnit\Framework\TestCase;
use Yiranzai\Tools\Zval;

class ZvalTest extends TestCase
{
    public function testIsRefto()
    {
        $leftVar  = 'test';
        $rightVar = &$leftVar;

        $this->assertTrue(Zval::isRef($rightVar, $leftVar));


        $leftVar  = ['test'];
        $rightVar = &$leftVar;

        $this->assertTrue(Zval::isRef($leftVar, $rightVar));
    }
}
