<?php

namespace App\Tests\Leetcode;

use App\Leetcode\KidsWithTheGreatestNumberOfCandies;
use PHPUnit\Framework\TestCase;

class KidsWithTheGreatestNumberOfCandiesTest extends TestCase
{
    public static function kidsWithExtraCandiesProvider(): array
    {
        return [
            [
                'candies' => [2, 3, 5, 1, 3],
                'extraCandies' => 3,
                'expected' => [true, true, true, false, true],
            ],
            [
                'candies' => [4, 2, 1, 1, 2],
                'extraCandies' => 1,
                'expected' => [true, false, false, false, false],
            ],
            [
                'candies' => [12, 1, 12],
                'extraCandies' => 10,
                'expected' => [true, false, true],
            ],
        ];
    }

    /**
     * @dataProvider kidsWithExtraCandiesProvider
     */
    public function testKidsWithCandies(array $candies, int $extraCandies, array $expected): void
    {
        $solution = new KidsWithTheGreatestNumberOfCandies();
        self::assertSame($expected, $solution->kidsWithCandies($candies, $extraCandies));
    }
}