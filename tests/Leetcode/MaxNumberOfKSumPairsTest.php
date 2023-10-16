<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaxNumberOfKSumPairs;
use PHPUnit\Framework\TestCase;

class MaxNumberOfKSumPairsTest extends TestCase
{
    public static function maxOperationsProvider(): array
    {
        return [
            [
                'nums' => [1, 2, 3, 4],
                'k' => 5,
                'expectedNrOfSums' => 2,
            ],
            [
                'nums' => [3, 1, 3, 4, 3],
                'k' => 6,
                'expectedNrOfSums' => 1,
            ],
            [
                'nums' => [2, 5, 4, 4, 1, 3, 4, 4, 1, 4, 4, 1, 2, 1, 2, 2, 3, 2, 4, 2],
                'k' => 3,
                'expectedNrOfSums' => 4,
            ],
        ];
    }

    /**
     * @dataProvider maxOperationsProvider
     */
    public function testMaxOperations(array $nums, int $k, int $expectedNrOfSums): void
    {
        $solution = new MaxNumberOfKSumPairs();
        self::assertSame($expectedNrOfSums, $solution->maxOperations($nums, $k));
    }
}