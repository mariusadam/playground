<?php

namespace App\Tests\Leetcode;

use App\Leetcode\FourSumGeneralized;
use PHPUnit\Framework\TestCase;

class FourSumGeneralizedTest extends TestCase
{
    public static function fourSumProvider(): array
    {
        return [
            [
                'nums' => [1, 0, -1, 0, -2, 2],
                'target' => 0,
                'expected' => [[-2, -1, 1, 2], [-2, 0, 0, 2], [-1, 0, 0, 1]]
            ],
            [
                'nums' => [2, 2, 2, 2, 2],
                'target' => 8,
                'expected' => [[2, 2, 2, 2]],
            ],
            [
                'nums' => [1, 2, 3, 3, 6, 0, 4, 5, 0],
                'target' => 9,
                'expected' => [[0, 0, 3, 6], [0, 0, 4, 5], [0, 1, 2, 6], [0, 1, 3, 5], [0, 2, 3, 4], [1, 2, 3, 3]],
            ],
            [
                'nums' => [-3, -2, -1, 0, 0, 1, 2, 3],
                'target' => 0,
                'expected' => [[-3, -2, 2, 3], [-3, -1, 1, 3], [-3, 0, 0, 3], [-3, 0, 1, 2], [-2, -1, 0, 3], [-2, -1, 1, 2], [-2, 0, 0, 2], [-1, 0, 0, 1]],
            ],
        ];
    }

    /**
     * @dataProvider fourSumProvider
     */
    public function testFourSumGeneralized(array $nums, int $target, array $expected): void
    {
        $solution = new FourSumGeneralized();
        self::assertSame($expected, $solution->fourSum($nums, $target));
    }
}
