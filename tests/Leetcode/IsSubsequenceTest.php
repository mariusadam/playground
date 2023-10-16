<?php

namespace App\Tests\Leetcode;

use App\Leetcode\IsSubsequence;
use PHPUnit\Framework\TestCase;

class IsSubsequenceTest extends TestCase
{
    public function isSubSequenceProvider(): array
    {
        return [
            ['s' => '', 't' => '', 'expected' => true],
            ['s' => 'abc', 't' => 'ahbgdc', 'expected' => true],
            ['s' => 'axc', 't' => 'ahbgdc', 'expected' => false],
        ];
    }

    /**
     * @dataProvider isSubSequenceProvider
     */
    public function testIsSubsequence(string $s, string $t, bool $expected): void
    {
        $solution = new IsSubsequence();
        self::assertSame($expected, $solution->isSubsequence($s, $t));
    }
}