<?php

namespace App\Tests\Leetcode;

use App\Leetcode\StringCompression;
use PHPUnit\Framework\TestCase;

class StringCompressionTest extends TestCase
{
    public function compressProvider(): array
    {
        return [
            [
                'chars' => ["a", "a", "b", "b", "c", "c", "c"],
                'expected' => ["a", "2", "b", "2", "c", "3"],
            ],
            [
                'chars' => ["a"],
                'expected' => ["a"],
            ],
            [
                'chars' => ["a", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b", "b"],
                'expected' => ["a", "b", "1", "2"],
            ],
        ];
    }

    /**
     * @dataProvider compressProvider
     */
    public function testCompress(array $chars, array $expected): void
    {
        $solution = new StringCompression();
        $resultLength = $solution->compress($chars);
        self::assertSame($resultLength, count($expected));
        self::assertSame($expected, array_slice($chars, 0, $resultLength));
    }
}