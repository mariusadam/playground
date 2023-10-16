<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/find-the-index-of-the-first-occurrence-in-a-string/
 */
class FindTheIndexOfTheFirstOccurenceInAStringKmp
{
    public function strStr(string $haystack, string $needle): int
    {
        $haystackLength = strlen($haystack);
        $needleLength = strlen($needle);
        $lps = array_fill(0, $needleLength, 0);
        $pre = 0;
        for ($i = 1; $i < $needleLength; $i++) {
            while ($pre > 0 && $needle[$pre] !== $needle[$i]) {
                $pre = $lps[$pre - 1];
            }
            if ($needle[$pre] === $needle[$i]) {
                $pre++;
                $lps[$i] = $pre;
            }
        }

        $needlePosition = 0;
        for ($haystackPosition = 0; $haystackPosition < $haystackLength; $haystackPosition++) {
            while ($needlePosition > 0 && $needle[$needlePosition] !== $haystack[$haystackPosition]) {
                $needlePosition = $lps[$needlePosition - 1];
            }
            if ($needle[$needlePosition] === $haystack[$haystackPosition]) {
                $needlePosition++;
            }
            if ($needlePosition === $needleLength) {
                return $haystackPosition - $needleLength + 1;
            }
        }

        return -1;
    }
}