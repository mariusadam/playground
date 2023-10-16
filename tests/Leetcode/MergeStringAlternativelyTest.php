<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MergeStringAlternatively;
use PHPUnit\Framework\TestCase;

class MergeStringAlternativelyTest extends TestCase
{
    public static function mergeAlternativelyProvider(): array
    {
        return [
            [
                'word1' => 'abc',
                'word2' => '123',
                'expected' => 'a1b2c3',
            ],
            [
                'word1' => 'abcd',
                'word2' => '12',
                'expected' => 'a1b2cd',
            ],
            [
                'word1' => 'ab',
                'word2' => '1234',
                'expected' => 'a1b234',
            ],
        ];
    }

    /**
     * @dataProvider mergeAlternativelyProvider
     */
    public function testMergeAlternatively(string $word1, string $word2, string $expected): void
    {
        $solution = new MergeStringAlternatively();
        self::assertSame($expected, $solution->mergeAlternately($word1, $word2));
    }
}