<?php

namespace App\Tests\Leetcode;

use App\Leetcode\DetermineIfTwoStringsAreClose;
use PHPUnit\Framework\TestCase;

class DetermineIfTwoStringsAreCloseTest extends TestCase
{
    public static function closeStringProvider(): array
    {
        return [
            ['word1' => 'abc', 'word2' => 'bca', 'expected' => true],
            ['word1' => 'aaccbb', 'word2' => 'abcccc', 'expected' => false],
            ['word1' => 'a', 'word2' => 'aa', 'expected' => false],
            ['word1' => 'cabbba', 'word2' => 'abbccc', 'expected' => true],
            ['word1' => 'cabbba', 'word2' => 'aabbss', 'expected' => false],
            ['word1' => 'abbzzca', 'word2' => 'babzzcz', 'expected' => false],
            ['word1' => 'aaabbbbccddeeeeefffff', 'word2' => 'aaaaabbcccdddeeeeffff', 'expected' => false],
        ];
    }

    /**
     * @dataProvider closeStringProvider
     */
    public function testCloseStrings(string $word1, string $word2, bool $expected): void
    {
        $solution = new DetermineIfTwoStringsAreClose();
        self::assertSame($expected, $solution->closeStrings($word1, $word2));
    }
}