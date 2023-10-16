<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestSubarrayOfOnesAfterDeletingOneElement;
use PHPUnit\Framework\TestCase;

class LongestSubarrayOfOnesAfterDeletingOneElementTest extends TestCase
{
    public static function longestSubarrayProvider(): array
    {
        return [
            ['nums' => [1, 1, 0, 1], 'expected' => 3],
            ['nums' => [0, 1, 1, 1, 0, 1, 1, 0, 1], 'expected' => 5],
            ['nums' => [1, 1, 1], 'expected' => 2],
            ['nums' => [1, 1, 0], 'expected' => 2],
            ['nums' => [0, 0, 0], 'expected' => 0],
            ['nums' => [], 'expected' => 0],
        ];
    }

    /**
     * @dataProvider longestSubarrayProvider
     */
    public function testLongestSubarray(array $nums, int $expected): void
    {
        $solution = new LongestSubarrayOfOnesAfterDeletingOneElement();
        self::assertSame($expected, $solution->longestSubarray($nums));
    }
}