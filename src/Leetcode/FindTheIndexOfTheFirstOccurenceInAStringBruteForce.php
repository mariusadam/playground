<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/
 */
class FindTheIndexOfTheFirstOccurenceInAStringBruteForce
{
    public function strStr(string $haystack, string $needle): int
    {
        $needleLength = strlen($needle);
        $maxHayStackPosition = strlen($haystack) - $needleLength;
        $i = 0;
        while ($i <= $maxHayStackPosition) {
            $j = $i;
            $needlePosition = 0;
            while ($needlePosition < $needleLength && $haystack[$j] === $needle[$needlePosition]) {
                $j++;
                $needlePosition++;
            }
        
            if ($needlePosition === $needleLength) {
                return $i;
            }

            $i++;
        }

        return -1;
    }
}