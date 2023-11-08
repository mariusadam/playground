<?php

namespace App\Tests\Leetcode;

use App\Leetcode\KokoEatingBananas;
use PHPUnit\Framework\TestCase;

class KokoEatingBananasTest extends TestCase
{
    public static function minEatingSpeed(): array
    {
        return [
            [
                'piles' => [3, 6, 7, 11],
                'h' => 8,
                'expected' => 4,
            ],
            [
                'piles' => [30, 11, 23, 4, 20],
                'h' => 5,
                'expected' => 30,
            ],
            [
                'piles' => [30, 11, 23, 4, 20],
                'h' => 6,
                'expected' => 23,
            ],
            [
                'piles' => [30],
                'h' => 1,
                'expected' => 30,
            ],
        ];
    }

    /**
     * @dataProvider minEatingSpeed
     */
    public function testMinEatingSpeed(array $piles, int $h, int $expected): void
    {
        $solution = new KokoEatingBananas();
        self::assertSame($expected, $solution->minEatingSpeed($piles, $h));
    }
}