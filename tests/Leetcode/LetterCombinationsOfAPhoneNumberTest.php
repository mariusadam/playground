<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LetterCombinationsOfAPhoneNumber;
use PHPUnit\Framework\TestCase;

class LetterCombinationsOfAPhoneNumberTest extends TestCase
{
    public static function letterCombinationsProvider(): array
    {
        return [
            [
                'digits' => '23',
                'expected' => ["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"],
            ],
            [
                'digits' => '',
                'expected' => [],
            ],
            [
                'digits' => '2',
                'expected' => ['a', 'b', 'c'],
            ],
        ];
    }

    /**
     * @dataProvider letterCombinationsProvider
     */
    public function testLetterCombinations(string $digits, array $expected): void
    {
        $solution = new LetterCombinationsOfAPhoneNumber();
        self::assertSame($expected, $solution->letterCombinations($digits));
    }
}
