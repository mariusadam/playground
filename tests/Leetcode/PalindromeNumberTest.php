<?php

namespace App\Tests\Leetcode;

use App\Leetcode\PalindromeNumber;
use PHPUnit\Framework\TestCase;

class PalindromeNumberTest extends TestCase
{
    public static function isPalindromeProvider(): array
    {
        return [
            ['x' => 121, 'expected' => true],
            ['x' => 10, 'expected' => false],
            ['x' => -121, 'expected' => false],
        ];
    }

    /**
     * @dataProvider isPalindromeProvider
     */
    public function testIsPalindrome(int $x, bool $expected): void
    {
        $solution = new PalindromeNumber();
        self::assertSame($expected, $solution->isPalindrome($x));
    }
}
