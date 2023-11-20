<?php

namespace App\Tests\Leetcode;

use App\Leetcode\UniquePaths;
use PHPUnit\Framework\TestCase;

class UniquePathsTest extends TestCase
{
    public static function uniquePathsProvider(): array
    {
        return [
            ['m' => 3, 'n' => 2, 'expected' => 3],
            ['m' => 3, 'n' => 7, 'expected' => 28],
        ];
    }

    /**
     * @dataProvider uniquePathsProvider
     */
    public function testUniquePaths(int $m, int $n, int $expected): void
    {
        $solution = new UniquePaths();
        self::assertSame($expected, $solution->uniquePaths($m, $n));
    }
}