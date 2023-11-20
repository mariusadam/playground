<?php

namespace App\Tests\Leetcode;

use App\Leetcode\HouseRobber;
use PHPUnit\Framework\TestCase;

class HouseRobberTest extends TestCase
{
    public function robProvider(): array
    {
        return [
            [
                'nums' => [2, 1, 1, 2],
                'expected' => 4,
            ],
            [
                'nums' => [1, 2, 3, 1],
                'expected' => 4,
            ],
            [
                'nums' => [2, 7, 9, 3, 1],
                'expected' => 12,
            ],
        ];
    }

    /**
     * @dataProvider robProvider
     */
    public function testRob(array $nums, int $expected): void
    {
        $solution = new HouseRobber();
        self::assertSame($expected, $solution->rob($nums));
    }
}
