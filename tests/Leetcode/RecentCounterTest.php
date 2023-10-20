<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RecentCounter;
use PHPUnit\Framework\TestCase;

class RecentCounterTest extends TestCase
{
    private RecentCounter $counter;

    protected function setUp(): void
    {
        $this->counter = new RecentCounter();
    }

    public function testPing(): void
    {
        self::assertSame(1, $this->counter->ping(1));
        self::assertSame(2, $this->counter->ping(100));
        self::assertSame(3, $this->counter->ping(3001));
        self::assertSame(3, $this->counter->ping(3002));
    }
}
