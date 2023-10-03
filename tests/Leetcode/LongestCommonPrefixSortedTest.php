<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestCommonPrefixSorted;
use PHPUnit\Framework\TestCase;

class LongestCommonPrefixSortedTest extends TestCase
{
    public static function longestCommonPrefixSortedProvider(): array
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
     * @dataProvider longestCommonPrefixSortedProvider
     */
    public function testLongestCommonPrefixSorted(array $strs, string $expectedPrefix): void
    {
        $solution = new LongestCommonPrefixSorted();
        self::assertSame($expectedPrefix, $solution->longestCommonPrefix($strs));
    }
}
