<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RegularExpressionMatching;
use PHPUnit\Framework\TestCase;

class RegularExpressionMatchingTest extends TestCase
{
    public static function isMatchProvider(): array
    {
        return [
            [
                'subject' => 'aa',
                'pattern' => 'a',
                'expected' => false,
            ],
            [
                'subject' => 'aa',
                'pattern' => 'a*',
                'expected' => true,
            ],
            [
                'subject' => 'ab',
                'pattern' => '.*',
                'expected' => true,
            ],
            [
                'subject' => 'abbbcda',
                'pattern' => 'ab*cda',
                'expected' => true,
            ],
            [
                'subject' => 'abbbcda',
                'pattern' => '.*z',
                'expected' => false,
            ],
            [
                'subject' => 'abbbcda',
                'pattern' => '.*da',
                'expected' => true,
            ],
            [
                'subject' => 'aab',
                'pattern' => 'c*a*b',
                'expected' => true,
            ],
            [
                'subject' => 'ab',
                'pattern' => '.*c',
                'expected' => false,
            ],
            [
                'subject' => 'abc',
                'pattern' => '.*c',
                'expected' => true,
            ],
            [
                'subject' => 'abc',
                'pattern' => '.*cd',
                'expected' => false,
            ],
            [
                'subject' => 'mississippi',
                'pattern' => 'mis*is*p*.',
                'expected' => false,
            ],
            [
                'subject' => 'mississippi',
                'pattern' => 'mis*is*ip*.',
                'expected' => true,
            ],
            [
                'subject' => 'mississippiasdfc',
                'pattern' => 'miss.*',
                'expected' => true,
            ],
        ];
    }

    /**
     * @dataProvider isMatchProvider
     */
    public function testIsMatch(string $subject, string $pattern, bool $expected): void
    {
        $solution = new RegularExpressionMatching();
        self::assertSame($expected, $solution->isMatch($subject, $pattern));
    }
}
