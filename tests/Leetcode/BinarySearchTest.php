<?php

namespace App\Tests\Leetcode;

use App\Leetcode\BinarySearch;
use PHPUnit\Framework\TestCase;

class BinarySearchTest extends TestCase
{
    public static function binarySearchProvider(): array
    {
        return [
            [
                'nums' => [-1, 0, 3, 5, 9, 12],
                'target' => 9,
                'expected' => 4,
            ],
            [
                'nums' => [-1, 0, 3, 5, 9, 12],
                'target' => 2,
                'expected' => -1,
            ],
            [
                'nums' => [2, 5],
                'target' => 0,
                'expected' => -1,
            ],
        ];
    }

    /**
     * @dataProvider binarySearchProvider
     */
    public function testBinarySearch(array $nums, int $target, int $expected): void
    {
        $solution = new BinarySearch();
        self::assertSame($expected, $solution->search($nums, $target));
    }
}