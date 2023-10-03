<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ReverseInteger;
use PHPUnit\Framework\TestCase;

class ReverseIntegerTest extends TestCase
{
    public static function reverseProvider(): array
    {
        return [
            [
                'x' => 123,
                'expectedOutput' => 321,
            ],
            [
                'x' => -123,
                'expectedOutput' => -321,
            ],
            [
                'x' => -1233,
                'expectedOutput' => -3321,
            ],
            [
                'x' => 120,
                'expectedOutput' => 21,
            ],
            [
                'x' => 1534236469,
                'expectedOutput' => 0,
            ],
        ];
    }

    /**
     * @dataProvider reverseProvider
     */
    public function testReverse(int $x, int $expectedOutput): void
    {
        $solution = new ReverseInteger();
        self::assertSame($expectedOutput, $solution->reverse($x));
    }
}
