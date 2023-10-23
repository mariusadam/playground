<?php

namespace App\Tests\Leetcode;

use App\Leetcode\EvaluateDisivion;
use PHPUnit\Framework\TestCase;

class EvaluateDisivionTest extends TestCase
{
    public static function calcEquationProvider(): array
    {
        return [
            [
                'equations' => [["a", "b"], ["b", "c"]],
                'values' => [2.0, 3.0],
                'queries' => [["a", "c"], ["b", "a"], ["a", "e"], ["a", "a"], ["x", "x"]],
                'expected' => [6.00000, 0.50000, -1.00000, 1.00000, -1.00000],
            ],
            [
                'equations' => [["a", "b"], ["b", "c"], ["bc", "cd"]],
                'values' => [1.5, 2.5, 5.0],
                'queries' => [["a", "c"], ["c", "b"], ["bc", "cd"], ["cd", "bc"]],
                'expected' => [3.75000, 0.40000, 5.00000, 0.20000],
            ],
            [
                'equations' => [["a", "b"]],
                'values' => [0.5],
                'queries' => [["a", "b"], ["b", "a"], ["a", "c"], ["x", "y"]],
                'expected' => [0.50000, 2.00000, -1.00000, -1.00000],
            ],
            [
                'equations' => [["b", "a"], ["c", "b"], ["d", "c"], ["e", "d"], ["f", "e"], ["g", "f"], ["h", "g"], ["i", "h"], ["j", "i"], ["k", "j"], ["k", "l"], ["l", "m"], ["m", "n"], ["n", "o"], ["o", "p"], ["p", "q"], ["q", "r"], ["r", "s"], ["s", "t"], ["t", "u"]],
                'values' => [1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05, 1e-05],
                'queries' => [["a", "u"]],
                'expected' => [1.00000],
            ],
        ];
    }

    /**
     * @dataProvider calcEquationProvider
     */
    public function testCalcEquation(array $equations, array $values, array $queries, array $expected): void
    {
        $solution = new EvaluateDisivion();
        self::assertSame($expected, $solution->calcEquation($equations, $values, $queries));
    }
}