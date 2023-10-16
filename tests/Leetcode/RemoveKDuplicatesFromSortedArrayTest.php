<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RemoveKDuplicatesFromSortedArray;
use PHPUnit\Framework\TestCase;

class RemoveKDuplicatesFromSortedArrayTest extends TestCase
{
    public static function removeDuplicatesProvider(): array
    {
        return [
            [
                'nums' => [],
                'expected' => [],
            ],
            [
                'nums' => [1, 1, 2],
                'expected' => [1, 2],
            ],
            [
                'nums' => [0, 0, 1, 1, 1, 2, 2, 3, 3, 4],
                'expected' => [0, 1, 2, 3, 4],
            ],
        ];
    }

    /**
     * @dataProvider removeDuplicatesProvider
     */
    public function testRemoveDuplicates(array $nums, array $expected): void
    {
        $solution = new RemoveKDuplicatesFromSortedArray();
        $k = $solution->removeDuplicates($nums);
        self::assertSame(count($expected), $k);
        self::assertSame($expected, array_slice($nums, 0, $k));
    }
}