<?php

namespace App\Tests\Leetcode;

use App\Leetcode\TwoSum;
use PHPUnit\Framework\TestCase;

class TwoSumTest extends TestCase
{
    public static function twoSumProvider(): array
    {
        return [
            [
                'nums' => [2, 7, 11, 15],
                'target' => 9,
                'expectedOutput' => [0, 1]
            ],
            [
                'nums' => [3, 2, 4],
                'target' => 6,
                'expectedOutput' => [1, 2]
            ],
            [
                'nums' => [3, 3],
                'target' => 6,
                'expectedOutput' => [0, 1]
            ], [
                'nums' => [-1, 0],
                'target' => -1,
                'expectedOutput' => [0, 1]
            ],
        ];
    }

    /**
     * @dataProvider twoSumProvider
     */
    public function testTwoSum(array $nums, int $target, array $expectedOutput): void
    {
        $solution = new TwoSum();
        self::assertSame($expectedOutput, $solution->twoSum($nums, $target));
    }

    /**
     * @dataProvider twoSumProvider
     */
    public function testTwoSumMap(array $nums, int $target, array $expectedOutput): void
    {
        $solution = new TwoSum();
        self::assertSame($expectedOutput, $solution->twoSumMap($nums, $target));
    }
}