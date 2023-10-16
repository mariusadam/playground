<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/divide-two-integers/
 */
class DivideTwoIntegers
{
    public const INT_MAX = (1 << 31) - 1;
    public const INT_MIN = - (1 << 31);

    public function divide(int $dividend, int $divisor): int
    {
        // edge casese
        if ($dividend === self::INT_MIN && $divisor === -1) {
            return self::INT_MAX;
        }
        if ($dividend === self::INT_MIN && $divisor === 1) {
            return self::INT_MIN;
        }
        if ($dividend === self::INT_MIN && $divisor === self::INT_MIN) {
            return 1;
        }
        if ($divisor === self::INT_MIN) {
            return 0;
        }

        // work with absolute values
        $a = $dividend;
        $b = $divisor < 0 ? -$divisor : $divisor;
        $quotient = 0;
        // handle possible overflow that could occur by changing te sign
        if ($a === self::INT_MIN) {
            $a += $b;
            $quotient++;
        }
        $a = $a < 0 ? -$a : $a;

        while ($a >= $b) {
            $shift = 0;
            while ($a >= $b << ($shift + 1)) {
                $shift++;
            }

            $quotient += 1 << $shift;
            $a -= $b << $shift;
        }
        if ($quotient > self::INT_MAX) {
            throw new \RuntimeException(sprintf('Quotient %s is overflowing', $quotient));
        }

        return ($dividend >= 0 === $divisor >= 0) ? $quotient : -$quotient;
    }
}