<?php

namespace App\Tests\Leetcode;

use App\Leetcode\StringToIntegerAtoi;
use PHPUnit\Framework\TestCase;

class StringToIntegerAtoiTest extends TestCase
{
    public static function myAtoiProvider(): array
    {
        return [
            ['s' => '42', 'expectedInt' => 42],
            ['s' => '     -42', 'expectedInt' => -42],
            ['s' => '4193 with words', 'expectedInt' => 4193],
            ['s' => '-91283472332', 'expectedInt' => -2147483648],
            ['s' => '+1', 'expectedInt' => 1],
        ];
    }

    /**
     * @dataProvider myAtoiProvider
     */
    public function testMyAtoi(string $s, int $expectedInt): void
    {
        $solution = new StringToIntegerAtoi();
        self::assertSame($expectedInt, $solution->myAtoi($s));
    }
}
