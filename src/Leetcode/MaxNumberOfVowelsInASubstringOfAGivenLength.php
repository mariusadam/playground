<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/maximum-number-of-vowels-in-a-substring-of-given-length
 */
class MaxNumberOfVowelsInASubstringOfAGivenLength
{
    private const VOWELS = [
        'a' => true,
        'e' => true,
        'i' => true,
        'o' => true,
        'u' => true,
    ];

    public function maxVowels(string $s, int $k): int
    {
        $currentVowels = 0;
        for ($i = 0; $i < $k; $i++) {
            if ($this->isVowel($s[$i])) {
                $currentVowels++;
            }
        }
        $maxVowels = $currentVowels;

        $sLen = strlen($s);
        for ($i = $k; $i < $sLen; $i++) {
            $currentVowels -= $this->isVowel($s[$i - $k]) ? 1 : 0;
            $currentVowels += $this->isVowel($s[$i]) ? 1 : 0;
            if ($currentVowels > $maxVowels) {
                $maxVowels = $currentVowels;
            }
        }

        return $maxVowels;
    }

    private function isVowel(string $chr): bool
    {
        return self::VOWELS[$chr] ?? false;
    }
}