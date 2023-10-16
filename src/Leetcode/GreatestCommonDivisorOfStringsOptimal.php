<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/greatest-common-divisor-of-strings
 */
class GreatestCommonDivisorOfStringsOptimal
{
    public function gcdOfStrings(string $str1, string $str2): string
    {
        if ($str1 . $str2 !== $str2 . $str1) {
            return '';
        }

        return substr($str1, 0, $this->gcd(strlen($str1), strlen($str2)));
    }

    private function gcd(int $a, int $b): int
    {
        while ($b > 0) {
            $r = $a % $b;
            $a = $b;
            $b = $r;
        }

        return $a;
    }
}