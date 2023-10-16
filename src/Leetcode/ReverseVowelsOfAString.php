<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/reverse-vowels-of-a-string
 */
class ReverseVowelsOfAString
{
    private const VOWELS = [
        'a' => true,
        'e' => true,
        'i' => true,
        'o' => true,
        'u' => true,
    ];
    public function reverseVowels(string $s): string
    {
        $left = 0;
        $right = strlen($s) - 1;
        while ($left < $right) {
            $leftIsVowel = $this->isVowel($s[$left]);
            $rightIsVowel = $this->isVowel($s[$right]);
            if ($leftIsVowel && $rightIsVowel) {
                $tmp = $s[$left];
                $s[$left] = $s[$right];
                $s[$right] = $tmp;
            }
            if ($leftIsVowel && !$rightIsVowel) {
                $right--;
                continue;
            }
            if ($rightIsVowel && !$leftIsVowel) {
                $left++;
                continue;
            }

            $left++;
            $right--;
        }

        return $s;
    }

    private function isVowel(string $chr): bool
    {
        return self::VOWELS[strtolower($chr)] ?? false;
    }
}