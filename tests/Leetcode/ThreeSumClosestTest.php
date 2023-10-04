<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ThreeSumClosest;
use PHPUnit\Framework\TestCase;

class ThreeSumClosestTest extends TestCase
{
    public static function threeSumClosestProvider(): array
    {
        return [
            [
                'nums' => [-1, 2, 1, -4],
                'target' => 1,
                'expectedSum' => 2,
            ],
            [
                'nums' => [0, 0, 0],
                'target' => 1,
                'expectedSum' => 0,
            ],
            [
                'nums' => [4, 0, 5, -5, 3, 3, 0, -4, -5],
                'target' => -2,
                'expectedSum' => -2,
            ],
            [
                'nums' => [-5, -5, -4, 0, 0, 3, 3, 4, 5],
                'target' => -2,
                'expectedSum' => -2,
            ],
        ];
    }

    /**
     * @dataProvider threeSumClosestProvider
     */
    public function testThreeSumClosest(array $nums, int $target, int $expectedSum): void
    {
        $solution = new ThreeSumClosest();
        self::assertSame($expectedSum, $solution->threeSumClosest($nums, $target));
    }
}