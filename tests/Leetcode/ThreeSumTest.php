<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ThreeSum;
use PHPUnit\Framework\TestCase;

class ThreeSumTest extends TestCase
{
    public static function threeSumProvider(): array
    {
        return [
            [
                'nums' => [-1, 0, 1, 2, -1, -4],
                'expectedThriplets' => [[-1, 0, 1], [-1, -1, 2]],
            ],
            [
                'nums' => [0, 1, 1],
                'expectedThriplets' => [],
            ],
            [
                'nums' => [0, 0, 0],
                'expectedThriplets' => [[0, 0, 0]],
            ],
        ];
    }

    /**
     * @dataProvider threeSumProvider
     */
    public function testThreeSum(array $nums, array $expectedThriplets): void
    {
        $solution = new ThreeSum();
        self::assertSame($expectedThriplets, $solution->threeSum($nums));
    }
}