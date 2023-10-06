<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/valid-parentheses/
 */
class ValidParantheses
{
    public function isValid(string $s): bool
    {
        $paranthesis = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
        ];

        $expectedParanthesisStack = [];
        $stringLength = strlen($s);
        for ($i = 0; $i < $stringLength; $i++) {
            if (isset($paranthesis[$s[$i]])) {
                $expectedParanthesisStack[] = $paranthesis[$s[$i]];
                continue;
            }

            $expected = array_pop($expectedParanthesisStack);
            if ($expected !== $s[$i]) {
                return false;
            }
        }

        return [] === $expectedParanthesisStack;
    }
}