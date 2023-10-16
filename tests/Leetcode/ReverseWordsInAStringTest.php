<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ReverseWordsInAString;
use PHPUnit\Framework\TestCase;

class ReverseWordsInAStringTest extends TestCase
{
    public static function reverseWordsProvider(): array
    {
        return [
            ['s' => 'test', 'expected' => 'test'],
            ['s' => 'the sky is blue', 'expected' => 'blue is sky the'],
            ['s' => '   hello world   ', 'expected' => 'world hello'],
            ['s' => 'a good      example', 'expected' => 'example good a'],
            ['s' => '', 'expected' => ''],
        ];
    }

    /**
     * @dataProvider reverseWordsProvider
     */
    public function testReverseWords(string $s, string $expected): void
    {
        $solution = new ReverseWordsInAString();
        self::assertSame($expected, $solution->reverseWords($s));
    }

        /**
     * @dataProvider reverseWordsProvider
     */
    public function testReverseWordsArrays(string $s, string $expected): void
    {
        $solution = new ReverseWordsInAString();
        self::assertSame($expected, $solution->reverseWordsArrays($s));
    }
}