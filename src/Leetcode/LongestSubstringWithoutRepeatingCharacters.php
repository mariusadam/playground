<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/longest-substring-without-repeating-characters/
 */
class LongestSubstringWithoutRepeatingCharacters
{
    public function lengthOfLongestSubstring(string $input): int
    {
        $maxLength = 0;
        for ($i = 0; $i < strlen($input); $i++) {
            $currentLength = 0;
            $currentMap = [];
            $j = $i;
            while ($j < strlen($input) && !array_key_exists($input[$j], $currentMap)) {
                $currentLength++;
                $currentMap[$input[$j]] = true;
                $j++;
            }

            $maxLength = max($maxLength, $currentLength);
        }

        return $maxLength;
    }

    public function lengthOfLongestSubstringImproved(string $input): int
    {
        $maxLength = 0;
        $i = 0;
        $j = 0;
        $lastSeenIndex = [];
        while ($j < strlen($input)) {
            while ($j < strlen($input) && !array_key_exists($input[$j], $lastSeenIndex)) {
                $lastSeenIndex[$input[$j]] = $j;
                $j++;
            }
            $currentLength = $j - $i;
            $maxLength = max($maxLength, $currentLength);
            if ($j < strlen($input)) {
                $oldI = $i;
                $i = $lastSeenIndex[$input[$j]] + 1;
                for ($k = $oldI; $k < $i; $k++) {
                    unset($lastSeenIndex[$input[$k]]);
                }
            }
        }

        return $maxLength;
    }
}