<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/longest-common-prefix/
 */
class LongestCommonPrefix
{
    /**
     * @param array<string> $strs
     */
    public function longestCommonPrefix(array $strs): string
    {
        $strCount = count($strs);
        if (1 === $strCount) {
            return $strs[0];
        }
        $minPrefix = '';
        $minPrefixLength = PHP_INT_MAX;
        for ($i = 0; $i < $strCount - 1; $i++) {
            for ($j = $i + 1; $j < $strCount; $j++) {
                $currentPrefix = $this->findCommonPrefix($strs[$i], $strs[$j]);
                $currentPrefixLength = strlen($currentPrefix);
                if ($currentPrefixLength < $minPrefixLength) {
                    $minPrefixLength = $currentPrefixLength;
                    $minPrefix = $currentPrefix;
                }
            }
        }

        return $minPrefix;
    }

    private function findCommonPrefix(string $first, string $second): string
    {
        $firstLength = strlen($first);
        $secondLength = strlen($second);
        $i = 0;
        $j = 0;
        $prefix = '';
        while ($i < $firstLength && $j < $secondLength && $first[$i] === $second[$j]) {
            $prefix .= $first[$i];
            $j++;
            $i++;
        }

        return $prefix;
    }
}
