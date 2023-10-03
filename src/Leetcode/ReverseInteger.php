<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/reverse-integer/
 */
class ReverseInteger
{
    public function reverse(int $x): int
    {
        $sign = $x > 0 ? 1 : -1;
        $maxValue = pow(2, 31) + ($sign > 0 ? -1 : 0);
        $x = abs($x);
        $reversed = 0;
        $isOverflow = false;
        while ($x != 0) {
            $digit = $x % 10;
            if ($reversed > ($maxValue - $digit) / 10) {
                $isOverflow = true;
                break;
            }
            $reversed = $reversed * 10 + $digit;
            $x = intdiv($x, 10);
        }

        return $isOverflow ? 0 : $sign * $reversed;
    }
}
