<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaxAverageSubArray1;
use PHPUnit\Framework\TestCase;

class MaxAverageSubArray1Test extends TestCase
{
    public static function findMaxAverageProvider(): array
    {
        return [
            [
                'nums' => [1, 12, -5, -6, 50, 3],
                'k' => 4,
                'expected' => 12.75,
            ],
            [
                'nums' => [5],
                'k' => 1,
                'expected' => 5.0,
            ],
        ];
    }

    /**
     * @dataProvider findMaxAverageProvider
     */
    public function testFindMaxAverage(array $nums, int $k, float $expected): void
    {
        $solution = new MaxAverageSubArray1();
        self::assertEqualsWithDelta($expected, $solution->findMaxAverage($nums, $k), 0.00001);
    }
}