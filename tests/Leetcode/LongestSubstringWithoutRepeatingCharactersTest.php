<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestSubstringWithoutRepeatingCharacters;
use PHPUnit\Framework\TestCase;

class LongestSubstringWithoutRepeatingCharactersTest extends TestCase
{
    public static function lengthOfLongestSubstringProvider(): array
    {
        return [
            [
                'input' => 'abcabcbb',
                'expected' => 3,
            ],
            [
                'input' => 'bbbbbbb',
                'expected' => 1,
            ],
            [
                'input' => 'pwwkew',
                'expected' => 3,
            ],
            [
                'input' => 'abba',
                'expected' => 2,
            ]
        ];
    }

    /**
     * @dataProvider lengthOfLongestSubstringProvider
     */
    public function testLengthOfLongestSubstring(string $input, int $expected): void
    {
        $solution = new LongestSubstringWithoutRepeatingCharacters();
        self::assertSame($expected, $solution->lengthOfLongestSubstring($input));
    }

    /**
     * @dataProvider lengthOfLongestSubstringProvider
     */
    public function testLengthOfLongestSubstringImproved(string $input, int $expected): void
    {
        $solution = new LongestSubstringWithoutRepeatingCharacters();
        self::assertSame($expected, $solution->lengthOfLongestSubstringImproved($input));
    }
}
