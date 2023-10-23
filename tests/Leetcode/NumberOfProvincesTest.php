<?php

namespace App\Tests\Leetcode;

use App\Leetcode\NumberOfProvinces;
use PHPUnit\Framework\TestCase;

class NumberOfProvincesTest extends TestCase
{
    public static function findCircleNumProvider(): array
    {
        return [
            [
                'isConnected' => [
                    [1, 1, 0],
                    [1, 1, 0],
                    [0, 0, 1],
                ],
                'expected' => 2,
            ],
            [
                'isConnected' => [
                    [1, 0, 0],
                    [0, 1, 0],
                    [0, 0, 1],
                ]
                ,
                'expected' => 3,
            ],
        ];
    }

    /**
     * @dataProvider findCircleNumProvider
     */
    public function testFindCircleNum(array $isConected, int $expected): void
    {
        $solution = new NumberOfProvinces();
        self::assertSame($expected, $solution->findCircleNum($isConected));
    }
}