<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaxNumberOfVowelsInASubstringOfAGivenLength;
use PHPUnit\Framework\TestCase;

class MaxNumberOfVowelsInASubstringOfAGivenLengthTest extends TestCase
{
    public static function maxVowelsProvider(): array
    {
        return [
            ['s' => 'abciiidef', 'k' => 3, 'expected' => 3],
            ['s' => 'aeiou', 'k' => 2, 'expected' => 2],
            ['s' => 'leetcode', 'k' => 3, 'expected' => 2],
        ];
    }

    /**
     * @dataProvider maxVowelsProvider
     */
    public function testMaxVowels(string $s, int $k, int $expected): void
    {
        $solution = new MaxNumberOfVowelsInASubstringOfAGivenLength();
        self::assertSame($expected, $solution->maxVowels($s, $k));
    }
}