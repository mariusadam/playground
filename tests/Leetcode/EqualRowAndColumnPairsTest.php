<?php

namespace App\Tests\Leetcode;

use App\Leetcode\EqualRowAndColumnPairs;
use PHPUnit\Framework\TestCase;

class EqualRowAndColumnPairsTest extends TestCase
{
    public static function equalPairsProvider(): array
    {
        return [
            [
                'grid' => [
                    [3, 2, 1],
                    [1, 7, 6],
                    [2, 7, 7],
                ],
                'expected' => 1,
            ],
            [
                'grid' => [
                    [3, 1, 2, 2],
                    [1, 4, 4, 5],
                    [2, 4, 2, 2],
                    [2, 4, 2, 2],
                ],
                'expected' => 3,
            ],
        ];
    }

    /**
     * @dataProvider equalPairsProvider
     */
    public function testEqualPairs(array $grid, int $expected): void
    {
        $solution = new EqualRowAndColumnPairs();
        self::assertSame($expected, $solution->equalPairs($grid));
    }

    /**
     * @dataProvider equalPairsProvider
     */
    public function testEqualPairsUsingHash(array $grid, int $expected): void
    {
        $solution = new EqualRowAndColumnPairs();
        self::assertSame($expected, $solution->equalPairsUsingHash($grid));
    }
}