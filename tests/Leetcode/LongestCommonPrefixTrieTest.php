<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestCommonPrefixTrie;
use App\Leetcode\LongestCommonPrefixTrieTrie;
use PHPUnit\Framework\TestCase;

class LongestCommonPrefixTrieTest extends TestCase
{
    public static function longestCommonPrefixTrieProvider(): array
    {
        return [
            [
                'strs' => ["dog", "racecar", "car"],
                'expectedPrefix' => '',
            ],
            [
                'strs' => ["flower", "flow", "flight"],
                'expectedPrefix' => 'fl',
            ],
            [
                'strs' => ["flow"],
                'expectedPrefix' => 'flow',
            ],
        ];
    }

    /**
     * @dataProvider longestCommonPrefixTrieProvider
     */
    public function testLongestCommonPrefixTrie(array $strs, string $expectedPrefix): void
    {
        $solution = new LongestCommonPrefixTrie();
        self::assertSame($expectedPrefix, $solution->longestCommonPrefix($strs));
    }
}
