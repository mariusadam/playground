<?php

namespace App\Tests\Leetcode;
use App\Leetcode\GreatestCommonDivisorOfStringsOptimal;
use PHPUnit\Framework\TestCase;

class GreatestCommonDivisorOfStringsOptimalTest extends TestCase
{
    public static function gcdOfStringProvider(): array
    {
        return [
            [
                'str1' => 'ABCD',
                'str2' => 'AB',
                'expected' => '',
            ],
            [
                'str1' => 'ABABAB',
                'str2' => 'ABAB',
                'expected' => 'AB',
            ],
            [
                'str1' => 'ABCABC',
                'str2' => 'ABC',
                'expected' => 'ABC',
            ],
            [
                'str1' => 'TAUXXTAUXXTAUXXTAUXXTAUXX',
                'str2' => 'TAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXXTAUXX',
                'expected' => 'TAUXX',
            ],
        ];
    }

    /**
     * @dataProvider gcdOfStringProvider
     */
    public function testGcdOfStrings(string $str1, string $str2, string $expected): void
    {
        $solution = new GreatestCommonDivisorOfStringsOptimal();
        self::assertSame($expected, $solution->gcdOfStrings($str1, $str2));
    }
}