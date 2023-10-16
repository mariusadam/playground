<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaxConsecutiveOnes3;
use PHPUnit\Framework\TestCase;

class MaxConsecutiveOnes3Test extends TestCase
{
    public static function longestOnesProvider(): array
    {
        return [
            [
                'nums' => [1, 1, 1, 0, 0, 0, 1, 1, 1, 1, 0],
                'k' => 2,
                'expected' => 6,
            ],
            [
                'nums' => [0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 1, 1, 1, 1],
                'k' => 3,
                'expected' => 10,
            ],
            [
                'nums' => [1, 1, 0, 1, 0, 0, 1, 1, 1, 0],
                'k' => 2,
                'expected' => 6,
            ],
            [
                'nums' => [0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 1, 0],
                'k' => 3,
                'expected' => 10,
            ],
            [
                'nums' => [0, 0, 0, 0, 0, 0, 1, 1, 1, 1],
                'k' => 1,
                'expected' => 5,
            ],
            [
                'nums' => [0, 0, 0, 0, 0, 0],
                'k' => 1,
                'expected' => 1,
            ],
            [
                'nums' => [1, 1, 1, 0, 0, 0, 1, 1, 1, 1],
                'k' => 0,
                'expected' => 4,
            ],
        ];
    }

    /**
     * @dataProvider longestOnesProvider
     */
    public function testLongestOnes(array $nums, int $k, int $expected): void
    {
        $solution = new MaxConsecutiveOnes3();
        self::assertSame($expected, $solution->longestOnes($nums, $k));

    }
}