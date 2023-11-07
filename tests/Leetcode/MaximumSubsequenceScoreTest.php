<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaximumSubsequenceScore;
use PHPUnit\Framework\TestCase;

class MaximumSubsequenceScoreTest extends TestCase
{
    public static function maxScoreProvider(): array
    {
        return [
            [
                'nums1' => [1, 3, 3, 2],
                'nums2' => [2, 1, 3, 4],
                'k' => 3,
                'expected' => 12,
            ],
            [
                'nums1' => [4, 2, 3, 1, 1],
                'nums2' => [7, 5, 10, 9, 6],
                'k' => 1,
                'expected' => 30,
            ],
            [
                'nums1' => [2, 1, 14, 12],
                'nums2' => [11, 7, 13, 6],
                'k' => 3,
                'expected' => 168,
            ],
        ];
    }

    /**
     * @dataProvider maxScoreProvider
     */
    public function testMaxScore(array $nums1, array $nums2, int $k, int $expected): void
    {
        $solution = new MaximumSubsequenceScore();
        self::assertSame($expected, $solution->maxScore($nums1, $nums2, $k));
    }
}