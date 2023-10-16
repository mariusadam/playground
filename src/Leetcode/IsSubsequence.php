<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/is-subsequence
 */
class IsSubsequence
{
    public function isSubsequence(string $s, string $t): bool
    {
        $sLength = strlen($s);
        $tLength = strlen($t);
        $tPos = 0;
        $sPos = 0;
        while ($sPos < $sLength && $tPos < $tLength) {
            if ($s[$sPos] === $t[$tPos]) {
                $sPos++;
            }
            $tPos++;
        }

        return $sPos === $sLength;
    }
}