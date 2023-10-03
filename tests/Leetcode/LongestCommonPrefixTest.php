<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestCommonPrefix;
use App\Leetcode\LongestCommonPrefixTrie;
use PHPUnit\Framework\TestCase;

class LongestCommonPrefixTest extends TestCase
{
    public static function longestCommonPrefixProvider(): array
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
     * @dataProvider longestCommonPrefixProvider
     */
    public function testLongestCommonPrefix(array $strs, string $expectedPrefix): void
    {
        $solution = new LongestCommonPrefix();
        self::assertSame($expectedPrefix, $solution->longestCommonPrefix($strs));
    }
}
