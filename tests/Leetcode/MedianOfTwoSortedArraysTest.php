<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MedianOfTwoSortedArrays;
use PHPUnit\Framework\TestCase;

class MedianOfTwoSortedArraysTest extends TestCase
{
    public static function findMedianSortedArraysProvider(): array
    {
        return [
            [
                'nums1' => [1, 3],
                'nums2' => [2],
                'expectedMedian' => 2,
            ],
            [
                'nums1' => [1, 2],
                'nums2' => [3, 4],
                'expectedMedian' => 2.5,
            ],
        ];
    }

    /**
     * @dataProvider findMedianSortedArraysProvider
     */
    public function testFindMedianSortedArrays(array $nums1, array $nums2, float $expectedMedian): void
    {
        $solution = new MedianOfTwoSortedArrays();
        self::assertSame($expectedMedian, $solution->findMedianSortedArrays($nums1, $nums2));
    }
}