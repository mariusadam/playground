<?php

namespace App\Tests\Leetcode;

use App\Leetcode\FindTheHighestAltitude;
use PHPUnit\Framework\TestCase;

class FindTheHighestAltitudeTest extends TestCase
{
    public static function largestAltitudeProvider(): array
    {
        return [
            ['gain' => [-5, 1, 5, 0, -7], 'expected' => 1],
            ['gain' => [-4, -3, -2, -1, 4, 3, 2], 'expected' => 0],
        ];
    }

    /**
     * @dataProvider largestAltitudeProvider
     */
    public function testLargestAltitude(array $gain, int $expected): void
    {
        $solution = new FindTheHighestAltitude();
        self::assertSame($expected, $solution->largestAltitude($gain));
    }
}