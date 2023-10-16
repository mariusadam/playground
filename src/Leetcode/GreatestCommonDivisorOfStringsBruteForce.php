<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/greatest-common-divisor-of-strings
 */
class GreatestCommonDivisorOfStringsBruteForce
{
    public function gcdOfStrings(string $str1, string $str2): string
    {
        $possibleGcd = $str1;
        if (strlen($str2) < strlen($str1)) {
            $possibleGcd = $str2;
        }
        $i = strlen($possibleGcd);
        while ($i > 0) {
            $current = substr($possibleGcd, 0, $i);
            if ($this->isGcd($str1, $current) && $this->isGcd($str2, $current)) {
                return $current;
            }

            $i--;
        }

        return '';
    }

    private function isGcd(string $strToCheck, string $possibleGcd): bool
    {
        if (strlen($strToCheck) % strlen($possibleGcd)) {
            return false;
        }

        $gcdPosition = 0;
        $strToCheckPosition = 0;
        while ($strToCheckPosition < strlen($strToCheck) && $possibleGcd[$gcdPosition] === $strToCheck[$strToCheckPosition]) {
            $strToCheckPosition++;
            $gcdPosition = ($gcdPosition + 1) % strlen($possibleGcd);
        }

        return $strToCheckPosition === strlen($strToCheck) && $gcdPosition === 0;
    }
}