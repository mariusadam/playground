<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MinCostClimbingStairs;
use PHPUnit\Framework\TestCase;

class MinCostClimbingStairsTest extends TestCase
{
    public static function minCimbingStairsProvider(): array
    {
        return [
            [
                'cost' => [10, 15, 20],
                'expected' => 15,
            ],
            [
                'cost' => [1, 100, 1, 1, 1, 100, 1, 1, 100, 1],
                'expected' => 6,
            ],
        ];
    }

    /**
     * @dataProvider minCimbingStairsProvider
     */
    public function testMinCostClimbingStairs(array $cost, int $expected): void
    {
        $solution = new MinCostClimbingStairs();
        self::assertSame($expected, $solution->minCostClimbingStairs($cost));
    }
}
