<?php

namespace App\Tests\Leetcode;

use App\Leetcode\FindThePivotIndex;
use PHPUnit\Framework\TestCase;

class FindThePivotIndexTest extends TestCase
{
    public static function findThePivotIndexProvider(): array
    {
        return [
            ['nums' => [1, 7, 3, 6, 5, 6], 'expected' => 3],
            ['nums' => [1, 2, 3], 'expected' => -1],
            ['nums' => [2, 1, -1], 'expected' => 0],
        ];
    }

    /**
     * @dataProvider findThePivotIndexProvider
     */
    public function testFindThePivtotIndex(array $nums, int $expected): void
    {
        $solution = new FindThePivotIndex();
        self::assertSame($expected, $solution->pivotIndex($nums));
    }
}