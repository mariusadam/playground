<?php

namespace App\Tests\Leetcode;

use App\Leetcode\FindTheDifferenceOfTwoArrays;
use PHPUnit\Framework\TestCase;

class FindTheDifferenceOfTwoArraysTest extends TestCase
{
    public static function findDifferenceProvider(): array
    {
        return [
            [
                'nums1' => [1, 2, 3],
                'nums2' => [2, 4, 6],
                'expected' => [
                    [1, 3],
                    [4, 6],
                ],
            ],
            [
                'nums1' => [1, 2, 3, 3],
                'nums2' => [1, 1, 2, 2],
                'expected' => [
                    [3],
                    [],
                ],
            ],
        ];
    }

    /**
     * @dataProvider findDifferenceProvider
     */
    public function testFindDifference(array $nums1, array $nums2, array $expected): void
    {
        $solution = new FindTheDifferenceOfTwoArrays();
        self::assertSame($expected, $solution->findDifference($nums1, $nums2));
    }
}