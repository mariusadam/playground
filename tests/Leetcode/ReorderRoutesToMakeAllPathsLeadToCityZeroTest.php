<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ReorderRoutesToMakeAllPathsLeadToCityZero;
use PHPUnit\Framework\TestCase;

class ReorderRoutesToMakeAllPathsLeadToCityZeroTest extends TestCase
{
    public static function minReorderProvider(): array
    {
        return [
            [
                'n' => 6,
                'connections' => [[0, 1], [1, 3], [2, 3], [4, 0], [4, 5]],
                'expected' => 3,
            ],
            [
                'n' => 5,
                'connections' => [[1, 0], [1, 2], [3, 2], [3, 4]],
                'expected' => 2,
            ],
            [
                'n' => 3,
                'connections' => [[1, 0], [2, 0]],
                'expected' => 0,
            ],
        ];
    }

    /**
     * @dataProvider minReorderProvider
     */
    public function testMinReorder(int $n, array $connections, int $expected): void
    {
        $solution = new ReorderRoutesToMakeAllPathsLeadToCityZero();
        self::assertSame($expected, $solution->minReorder($n, $connections));
    }
}