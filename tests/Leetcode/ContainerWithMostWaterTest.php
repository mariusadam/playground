<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ContainerWithMostWater;
use PHPUnit\Framework\TestCase;

class ContainerWithMostWaterTest extends TestCase
{
    public static function maxAreaProvider(): array
    {
        return [
            [
                'height' => [1, 1],
                'expectedMaxArea' => 1,
            ],
            [
                'height' => [1, 8, 6, 2, 5, 4, 8, 3, 7],
                'expectedMaxArea' => 49,
            ],
        ];
    }

    /**
     * @dataProvider maxAreaProvider
     */
    public function testMaxArea(array $height, int $expectedMaxArea): void
    {
        $solution = new ContainerWithMostWater();
        self::assertSame($expectedMaxArea, $solution->maxArea($height));
    }

    /**
     * @dataProvider maxAreaProvider
     */
    public function testMaxAreaUsingPointers(array $height, int $expectedMaxArea): void
    {
        $solution = new ContainerWithMostWater();
        self::assertSame($expectedMaxArea, $solution->maxAreaUsingPointers($height));
    }
}
