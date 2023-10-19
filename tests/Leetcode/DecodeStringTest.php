<?php

namespace App\Tests\Leetcode;

use App\Leetcode\DecodeString;
use PHPUnit\Framework\TestCase;

class DecodeStringTest extends TestCase
{
    public static function decodeStringProvider(): array
    {
        return [
            [
                's' => 'abc',
                'expected' => 'abc',
            ],
            [
                's' => '3[a]2[bc]',
                'expected' => 'aaabcbc',
            ],
            [
                's' => '2[abc]3[cd]ef',
                'expected' => 'abcabccdcdcdef',
            ],
            [
                's' => '3[a2[c]]',
                'expected' => 'accaccacc',
            ],
            [
                's' => '3[a2[c]2[b]]',
                'expected' => 'accbbaccbbaccbb',
            ],
            [
                's' => '3[z]2[2[y]pq4[2[jk]e1[f]]]ef',
                'expected' => 'zzzyypqjkjkefjkjkefjkjkefjkjkefyypqjkjkefjkjkefjkjkefjkjkefef',
            ],
            [
                's' => 'sd2[f2[e]g]i',
                'expected' => 'sdfeegfeegi',
            ],
            [
                's' => '2[2[y]pq4[2[jk]]e]',
                'expected' => 'yypqjkjkjkjkjkjkjkjkeyypqjkjkjkjkjkjkjkjke',
            ],
        ];
    }

    /**
     * @dataProvider decodeStringProvider
     */
    public function testDecodeString(string $s, string $expected): void
    {
        $solution = new DecodeString();
        self::assertSame($expected, $solution->decodeString($s));
    }
}