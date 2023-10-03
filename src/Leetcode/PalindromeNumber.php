<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/palindrome-number/
 */
class PalindromeNumber
{
    public function isPalindrome(int $x): bool
    {
        if ($x < 0) {
            return false;
        }

        $reversed = 0;
        $numberToReverse = $x;
        while ($numberToReverse != 0) {
            $reversed = $reversed * 10 + $numberToReverse % 10;
            $numberToReverse = intdiv($numberToReverse, 10);
        }

        return $x === $reversed;
    }
}