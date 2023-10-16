<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ReverseVowelsOfAString;
use PHPUnit\Framework\TestCase;

class ReverseVowelsOfAStringTest extends TestCase
{
    public static function reverseVowelsProvider(): array
    {
        return [
            ['s' => 'abcd', 'expected' => 'abcd'],
            ['s' => 'hello', 'expected' => 'holle'],
            ['s' => 'leetcode', 'expected' => 'leotcede'],
        ];
    }

    /**
     * @dataProvider reverseVowelsProvider
     */
    public function testReverseVowels(string $s, string $expected): void
    {
        $solution = new ReverseVowelsOfAString();
        self::assertSame($expected, $solution->reverseVowels($s));
    }
}