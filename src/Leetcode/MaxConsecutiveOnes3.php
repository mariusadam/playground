<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/max-consecutive-ones-iii
 */
class MaxConsecutiveOnes3
{
    /**
     * @param array<int> $nums
     */
    public function longestOnes(array $nums, int $k): int
    {
        $numsCount = count($nums);
        $left = 0;
        $zerosCount = 0;
        $maxLength = 0;
        for ($right = 0; $right < $numsCount; $right++) {
            if ($nums[$right] === 0) {
                $zerosCount++;
            }

            if ($zerosCount <= $k) {
                $maxLength = max($maxLength, $right - $left + 1);
            }

            if ($zerosCount > $k) {
                $zerosCount += $nums[$left] === 0 ? -1 : 0;
                $left++; 
            }
        }

        return $maxLength;
    }
}