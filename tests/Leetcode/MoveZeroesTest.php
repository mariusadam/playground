<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MoveZeroes;
use PHPUnit\Framework\TestCase;

class MoveZeroesTest extends TestCase
{
    public static function moveZeroesProvider(): array
    {
        return [
            [
                'nums' => [0, 1, 0, 3, 12],
                'expected' => [1, 3, 12, 0, 0],
            ],
            [
                'nums' => [],
                'expected' => [],
            ],
            [
                'nums' => [0],
                'expected' => [0],
            ],
        ];
    }

    /**
     * @dataProvider moveZeroesProvider
     */
    public function testMoveZeroes(array $nums, array $expected): void
    {
        $solution = new MoveZeroes();
        $solution->moveZeroes($nums);
        self::assertSame($expected, $nums);
    }

        /**
     * @dataProvider moveZeroesProvider
     */
    public function testMoveZeroesMinimalOperations(array $nums, array $expected): void
    {
        $solution = new MoveZeroes();
        $solution->moveZeroesMinimalOperations($nums);
        self::assertSame($expected, $nums);
    }
}