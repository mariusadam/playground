<?php

namespace App\Tests\Leetcode;

use App\Leetcode\NthTribonacciNumber;
use PHPUnit\Framework\TestCase;

class NthTribonacciNumberTest extends TestCase
{
    public static function tribonaciProvider(): array
    {
        return [
            ['n' => 4, 'expected' => 4],
            ['n' => 25, 'expected' => 1389537],
        ];
    }

    /**
     * @dataProvider tribonaciProvider
     */
    public function testTribonacci(int $n, int $expected): void
    {
        $solution = new NthTribonacciNumber();
        self::assertSame($expected, $solution->tribonacci($n));
    }
}
