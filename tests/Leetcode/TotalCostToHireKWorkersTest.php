<?php

namespace App\Tests\Leetcode;

use App\Leetcode\TotalCostToHireKWorkers;
use PHPUnit\Framework\TestCase;

class TotalCostToHireKWorkersTest extends TestCase
{
    public static function totalCostProvider(): array
    {
        return [
            [
                'costs' => [17, 12, 10, 2, 7, 2, 11, 20, 8],
                'k' => 3,
                'candidates' => 4,
                'expected' => 11,
            ],
            [
                'costs' => [1, 2, 4, 1],
                'k' => 3,
                'candidates' => 3,
                'expected' => 4,
            ],
            [
                'costs' => [5],
                'k' => 1,
                'candidates' => 1,
                'expected' => 5,
            ],
            [
                'costs' => [57, 33, 26, 76, 14, 67, 24, 90, 72, 37, 30],
                'k' => 11,
                'candidates' => 2,
                'expected' => 526,
            ],
            [
                'costs' => [18, 64, 12, 21, 21, 78, 36, 58, 88, 58, 99, 26, 92, 91, 53, 10, 24, 25, 20, 92, 73, 63, 51, 65, 87, 6, 17, 32, 14, 42, 46, 65, 43, 9, 75],
                'k' => 13,
                'candidates' => 23,
                'expected' => 223,
            ],
            [
                'costs' => [31, 25, 72, 79, 74, 65, 84, 91, 18, 59, 27, 9, 81, 33, 17, 58],
                'k' => 11,
                'candidates' => 2,
                'expected' => 423,
            ],
        ];
    }

    /**
     * @dataProvider totalCostProvider
     */
    public function testTotalCost(array $costs, int $k, int $candidates, int $expected): void
    {
        $solution = new TotalCostToHireKWorkers();
        self::assertSame($expected, $solution->totalCost($costs, $k, $candidates));
    }
}
