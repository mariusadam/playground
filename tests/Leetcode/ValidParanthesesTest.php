<?php

namespace App\Tests\Leetcode;
use App\Leetcode\ValidParantheses;
use PHPUnit\Framework\TestCase;

class ValidParanthesesTest extends TestCase
{
    public static function isValidProvider(): array
    {
        return [
            ['s' => '()', 'expected' => true],
            ['s' => '()[]{}', 'expected' => true],
            ['s' => '(]', 'expected' => false],
            ['s' => '([)]', 'expected' => false],
            ['s' => '(', 'expected' => false],
        ];
    }

    /**
     * @dataProvider isValidProvider
     */
    public function testIsValid(string $s, bool $expected): void
    {
        $solution = new ValidParantheses();
        self::assertSame($expected, $solution->isValid($s));
    }
}