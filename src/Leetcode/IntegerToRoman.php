<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/integer-to-roman/
 */
class IntegerToRoman
{
    private const DECIMAL_TO_ROMAN = [
        1 => 'I',
        5 => 'V',
        10 => 'X',
        50 => 'L',
        100 => 'C',
        500 => 'D',
        1000 => 'M',
    ];

    public function intToRoman(int $num): string
    {
        $decomposedNum = [];
        $magnitude = 1;
        while ($num != 0) {
            $decomposedNum[] = [
                'digit' => $num % 10,
                'magnitude' => $magnitude,
            ];
            $num = intdiv($num, 10);
            $magnitude *= 10;
        }

        $romanNumeral = '';
        for ($i = count($decomposedNum) - 1; $i >= 0; $i--) {
            $romanNumeral .= $this->computeNumeral($decomposedNum[$i]['digit'], $decomposedNum[$i]['magnitude']);
        }

        return $romanNumeral;
    }

    private function computeNumeral(int $digit, int $magnitude): string
    {
        if (4 === $digit) {
            return self::DECIMAL_TO_ROMAN[$magnitude].self::DECIMAL_TO_ROMAN[5 * $magnitude];
        }

        if (9 === $digit) {
            return self::DECIMAL_TO_ROMAN[$magnitude].self::DECIMAL_TO_ROMAN[10 * $magnitude];
        }

        if ($digit >= 5) {
            return self::DECIMAL_TO_ROMAN[5 * $magnitude].str_repeat(self::DECIMAL_TO_ROMAN[$magnitude], $digit - 5);
        }

        if ($digit >= 1) {
            return str_repeat(self::DECIMAL_TO_ROMAN[$magnitude], $digit);
        }

        return '';
    }
}
