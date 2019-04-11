<?php

declare(strict_types=1);

namespace Yiranzai\Tools\Tests;

use PHPUnit\Framework\TestCase;
use Yiranzai\SnowFlake\Node;
use Yiranzai\SnowFlake\SnowFlake;

/**
 * Class SnowFlakeTest
 * @package Yiranzai\SnowFlake\Tests
 */
class SnowFlakeTest extends TestCase
{

    /**
     *
     */
    public function testSnowFlake()
    {
        $node = null;
        $id   = 0;
        $this->assertNull($node);
        for ($i = 0; $i < 50000; $i++) {
            $id = SnowFlake::test(0, 1);
        }
        /** @var Node $node */
        $node = SnowFlake::analysis($id);
        $this->assertInstanceOf(Node::class, $node);
        $this->assertSame(0, $node->dataCenterID);
        $this->assertSame(1, $node->workerID);

        for ($i = 0; $i < 50000; $i++) {
            $id   = SnowFlake::next(0, 1);
            $node = SnowFlake::analysis($id);
        }
        $this->assertInstanceOf(Node::class, $node);
        $this->assertSame(0, $node->dataCenterID);
        $this->assertSame(1, $node->workerID);
    }
}
