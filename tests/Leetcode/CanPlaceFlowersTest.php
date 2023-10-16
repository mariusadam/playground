<?php

namespace App\Tests\Leetcode;

use App\Leetcode\CanPlaceFlowers;
use PHPUnit\Framework\TestCase;

class CanPlaceFlowersTest extends TestCase
{
    public static function canPlaceFlowersProvider(): array
    {
        return [
            [
                'flowerbed' => [1, 0, 0, 0, 1],
                'n' => 1,
                'expected' => true,
            ],
            [
                'flowerbed' => [1, 0, 0, 0, 1],
                'n' => 2,
                'expected' => false,
            ],
            [
                'flowerbed' => [0, 0, 1, 0, 0],
                'n' => 1,
                'expected' => true,
            ]
        ];
    }

    /**
     * @dataProvider canPlaceFlowersProvider
     */
    public function testCanPlaceFlowers(array $flowerbed, int $n, bool $expected): void
    {
        $solution = new CanPlaceFlowers();
        self::assertSame($expected, $solution->canPlaceFlowers($flowerbed, $n));
    }
}