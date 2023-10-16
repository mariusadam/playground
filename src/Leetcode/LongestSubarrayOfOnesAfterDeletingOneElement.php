<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/longest-subarray-of-1s-after-deleting-one-element
 */
class LongestSubarrayOfOnesAfterDeletingOneElement
{
    /**
     * @param array<int>
     */
    public function longestSubarray(array $nums): int
    {
        $maxLen = 0;
        $numZeros = 0;
        $left = 0;
        $numsCount = count($nums);
        for ($right = 0; $right < $numsCount; $right++) {
            if ($nums[$right] === 0) {
                $numZeros++;
            }

            while ($numZeros > 1) {
                $numZeros -= $nums[$left] === 0 ? 1 : 0;
                $left++;
            }
            
            $maxLen = max($maxLen, $right - $left);
        }

        return $maxLen;
    }
}