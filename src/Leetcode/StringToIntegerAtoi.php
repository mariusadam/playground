<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/string-to-integer-atoi/
 */
class StringToIntegerAtoi
{
    public function myAtoi(string $s): int
    {
        $length = strlen($s);
        $i = 0;
        // skip leading whitespaces
        while ($i < $length && $s[$i] === ' ') {
            $i++;
        }

        $sign = 1;
        if ($i < $length && ($s[$i] === '-' || $s[$i] === '+')) {
            $sign = $s[$i] === '-' ? -1 : 1;
            $i++;
        }

        // max = -2^31 or 2^31 - 1 depending on sign
        $maxValue = $sign > 0 ? pow(2, 31) - 1 : -pow(2, 31);
        $parsedInt = 0;
        while ($i < $length && $this->isDigit($s[$i])) {
            // set the right sign
            $digit = (ord($s[$i]) - ord('0')) * $sign;
            $nextThreshold = ($maxValue - $digit) / 10;
            if (($sign > 0 && $parsedInt > $nextThreshold) || ($sign < 0 && $parsedInt < $nextThreshold)) {
                $parsedInt = $maxValue;
                break;
            }

            $parsedInt = $parsedInt * 10 + $digit;
            $i++;
        }

        return $parsedInt;
    }

    private function isDigit(string $s): bool
    {
        return '0' <= $s && $s <= '9';
    }
}