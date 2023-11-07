<?php

namespace App\Tests\Leetcode;

use App\Leetcode\KthLargestElementInAnArray;
use PHPUnit\Framework\TestCase;

class KthLargestElementInAnArrayTest extends TestCase
{
    public function findKthLargestProvider(): array
    {
        return [
            [
                'nums' => [3, 2, 1, 5, 6, 4],
                'k' => 2,
                'expected' => 5,
            ],
            [
                'nums' => [3, 2, 3, 1, 2, 4, 5, 5, 6],
                'k' => 4,
                'expected' => 4,
            ],
        ];
    }

    /**
     * @dataProvider findKthLargestProvider
     */
    public function testFindKthLargest(array $nums, int $k, int $expected): void
    {
        $solution = new KthLargestElementInAnArray();
        self::assertSame($expected, $solution->findKthLargest($nums, $k));
    }
}
