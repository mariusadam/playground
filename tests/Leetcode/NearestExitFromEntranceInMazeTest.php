<?php

namespace App\Tests\Leetcode;

use App\Leetcode\NearestExitFromEntranceInMaze;
use PHPUnit\Framework\TestCase;

class NearestExitFromEntranceInMazeTest extends TestCase
{
    public static function nearestExitProvider(): array
    {
        return [
            [
                'maze' => [
                    ["+", "+", ".", "+"],
                    [".", ".", ".", "+"],
                    ["+", "+", "+", "."],
                ],
                'entrance' => [1, 2],
                'expected' => 1,
            ],
            [
                'maze' => [
                    ["+", "+", "+"],
                    [".", ".", "."],
                    ["+", "+", "+"]
                ],
                'entrance' => [1, 0],
                'expected' => 2,
            ],
            [
                'maze' => [
                    [".", "+"]
                ],
                'entrance' => [0, 0],
                'expected' => -1,
            ],
            [
                'maze' => [
                    ["+", ".", "+", "+", "+", "+", "+"],
                    ["+", ".", "+", ".", ".", ".", "+"],
                    ["+", ".", "+", ".", "+", ".", "+"],
                    ["+", ".", ".", ".", "+", ".", "+"],
                    ["+", "+", "+", "+", "+", ".", "+"]
                ],
                'entrance' => [0, 1],
                'expected' => 12,
            ],
        ];
    }

    /**
     * @dataProvider nearestExitProvider
     */
    public function testNearestExist(array $maze, array $entrance, int $expected): void
    {
        $solution = new NearestExitFromEntranceInMaze();
        self::assertSame($expected, $solution->nearestExit($maze, $entrance));
    }
}