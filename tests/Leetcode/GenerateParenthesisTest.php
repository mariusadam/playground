<?php

namespace App\Tests\Leetcode;

use App\Leetcode\GenerateParenthesis;
use PHPUnit\Framework\TestCase;

class GenerateParenthesisTest extends TestCase
{
    public function generateParanthesisProvider(): array
    {
        return [
            [
                'n' => 1,
                'expected' => ['()'],
            ],
            [
                'n' => 3,
                'expected' => ["((()))", "(()())", "(())()", "()(())", "()()()"],
            ],
        ];
    }

    /**
     * @dataProvider generateParanthesisProvider
     */
    public function testGenerateParanthesis(int $n, array $expected): void
    {
        $solution = new GenerateParenthesis();
        self::assertSame($expected, $solution->generateParenthesis($n));
    }


    /**
     * @dataProvider generateParanthesisProvider
     */
    public function testGenerateParanthesisAlternative(int $n, array $expected): void
    {
        $solution = new GenerateParenthesis();
        self::assertSame($expected, $solution->generateParenthesisAlternative($n));
    }
}