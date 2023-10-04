<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/letter-combinations-of-a-phone-number/
 */
class LetterCombinationsOfAPhoneNumber
{
    private const DIGIT_LETTERS_MAP = [
        2 => 'abc',
        3 => 'def',
        4 => 'ghi',
        5 => 'jkl',
        6 => 'mno',
        7 => 'pqrs',
        8 => 'tuv',
        9 => 'wxyz',
    ];

    private const DIGIT_LETTERS_LENGTH_MAP = [
        2 => 3,
        3 => 3,
        4 => 3,
        5 => 3,
        6 => 3,
        7 => 4,
        8 => 3,
        9 => 4,
    ];

    private string $digits;

    private int $digitsLength;

    /** @var array<string> */
    private array $combinations;

    /**
     * @param string $digits
     * @return array<string>
     */
    public function letterCombinations(string $digits): array
    {
        $this->digits = $digits;
        $this->digitsLength = strlen($digits);
        if ($this->digitsLength === 0) {
            return [];
        }

        $currentCombination = array_fill(0, $this->digitsLength, -1);
        $fillingPosition = 0;
        while ($fillingPosition >= 0) {
            $currentCombination[$fillingPosition] += 1;
            if ($currentCombination[$fillingPosition] >= self::DIGIT_LETTERS_LENGTH_MAP[$this->digits[$fillingPosition]]) {
                $currentCombination[$fillingPosition] = -1;
                $fillingPosition--;
                continue;
            }
            if ($fillingPosition < $this->digitsLength - 1) {
                $fillingPosition++;
                continue;
            }
            $this->collectCombination($currentCombination);
        }

        return $this->combinations;
    }

    private function collectCombination(array $currentCombination): void
    {
        $combinationString = '';
        for ($i = 0; $i < $this->digitsLength; $i++) {
            $digit = $this->digits[$i];
            $letterOffset = $currentCombination[$i];
            $combinationString .= self::DIGIT_LETTERS_MAP[$digit][$letterOffset];
        }

        $this->combinations[] = $combinationString;
    }
}