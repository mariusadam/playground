<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/roman-to-integer/
 */
class RomanToInteger
{
    private const ROMAN_TO_DECIMAL = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000,
    ];

    public function romanToInt(string $romanNumeral): int
    {
        $i = strlen($romanNumeral) - 1;
        $decimalNumber = 0;
        while ($i >= 0) {
            $step = 1;
            $currentValue = self::ROMAN_TO_DECIMAL[$romanNumeral[$i]];
            if ($i > 0 && $currentValue > self::ROMAN_TO_DECIMAL[$romanNumeral[$i - 1]]) {
                $currentValue = self::ROMAN_TO_DECIMAL[$romanNumeral[$i]] - self::ROMAN_TO_DECIMAL[$romanNumeral[$i - 1]];
                $step = 2;
            }

            $decimalNumber += $currentValue;
            $i = $i - $step;
        }

        return $decimalNumber;
    }
}
