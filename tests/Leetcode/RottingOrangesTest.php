<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RottingOranges;
use PHPUnit\Framework\TestCase;

class RottingOrangesTest extends TestCase
{
    public static function orangesRottingProvider(): array
    {
        return [
            [
                'grid' => [
                    [2, 1, 1],
                    [1, 1, 0],
                    [0, 1, 1],
                ],
                'expected' => 4,
            ],
            [
                'grid' => [
                    [2, 1, 1],
                    [0, 1, 1],
                    [1, 0, 1],
                ],
                'expected' => -1,
            ],
            [
                'grid' => [
                    [0, 2],
                ],
                'expected' => 0,
            ],
        ];
    }

    /**
     * @dataProvider orangesRottingProvider
     */
    public function testOrangesRotting(array $grid, int $expected): void
    {
        $solution = new RottingOranges();
        self::assertSame($expected, $solution->orangesRotting($grid));
    }
}