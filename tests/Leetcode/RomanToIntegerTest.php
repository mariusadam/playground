<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RomanToInteger;
use PHPUnit\Framework\TestCase;

class RomanToIntegerTest extends TestCase
{
    public function romanToIntProvider(): array
    {
        return [
            ['romanNumeral' => 'III', 'expectedInt' => 3],
            ['romanNumeral' => 'LVIII', 'expectedInt' => 58],
            ['romanNumeral' => 'MMMDCCCLXXXVIII', 'expectedInt' => 3888],
            ['romanNumeral' => 'MMMCMXCIX', 'expectedInt' => 3999],
        ];
    }

    /**
     * @dataProvider romanToIntProvider
     */
    public function testRomanToInt(string $romanNumeral, int $expectedInt): void
    {
        $solution = new RomanToInteger();
        self::assertSame($expectedInt, $solution->romanToInt($romanNumeral));
    }
}
