<?php

namespace App\Tests\Leetcode;

use App\Leetcode\CombinationSum3;
use PHPUnit\Framework\TestCase;

class CombinationSum3Test extends TestCase
{
    public static function combinationSum3Provider(): array
    {
        return [
            [
                'k' => 3,
                'n' => 7,
                'expected' => [
                    [1, 2, 4]
                ],
            ],
            [
                'k' => 3,
                'n' => 9,
                'expected' => [
                    [1, 2, 6],
                    [1, 3, 5],
                    [2, 3, 4],
                ],
            ],
            [
                'k' => 4,
                'n' => 1,
                'expected' => [],
            ],
        ];
    }

    /**
     * @dataProvider combinationSum3Provider
     */
    public function testCombinationSum3(int $k, int $n, array $expected): void
    {
        $solution = new CombinationSum3();
        self::assertSame($expected, $solution->combinationSum3($k, $n));
    }
}
