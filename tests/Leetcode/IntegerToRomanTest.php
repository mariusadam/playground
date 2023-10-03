<?php

namespace App\Tests\Leetcode;

use App\Leetcode\IntegerToRoman;
use PHPUnit\Framework\TestCase;

class IntegerToRomanTest extends TestCase
{
    public static function intToRomanProvider(): array
    {
        return [
            ['num' => 4, 'expectedRomanNumeral' => 'IV'],
            ['num' => 9, 'expectedRomanNumeral' => 'IX'],
            ['num' => 40, 'expectedRomanNumeral' => 'XL'],
            ['num' => 90, 'expectedRomanNumeral' => 'XC'],
            ['num' => 6, 'expectedRomanNumeral' => 'VI'],
            ['num' => 58, 'expectedRomanNumeral' => 'LVIII'],
            ['num' => 1994, 'expectedRomanNumeral' => 'MCMXCIV'],
            ['num' => 3, 'expectedRomanNumeral' => 'III'],
            ['num' => 3999, 'expectedRomanNumeral' => 'MMMCMXCIX'],
            ['num' => 671, 'expectedRomanNumeral' => 'DCLXXI'],
            ['num' => 1671, 'expectedRomanNumeral' => 'MDCLXXI'],
            ['num' => 1471, 'expectedRomanNumeral' => 'MCDLXXI'],
        ];
    }

    /**
     * @dataProvider intToRomanProvider
     */
    public function testIntToRoman(int $num, string $expectedRomanNumeral): void
    {
        $solution = new IntegerToRoman();
        self::assertSame($expectedRomanNumeral, $solution->intToRoman($num));
    }
}
