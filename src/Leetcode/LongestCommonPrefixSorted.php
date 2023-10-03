<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/longest-common-prefix/
 */
class LongestCommonPrefixSorted
{
    /**
     * @param array<string> $strs
     */
    public function longestCommonPrefix(array $strs): string
    {
        sort($strs);

        return $this->findCommonPrefix($strs[0], $strs[count($strs) - 1]);
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
