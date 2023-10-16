<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/maximum-average-subarray-i
 */
class MaxAverageSubArray1
{
    /**
     * @param array<int> $nums
     */
    public function findMaxAverage(array $nums, int $k): float
    {
        $numsCount = count($nums);
        $i = 0;
        $currentSum = 0;
        for ($i = 0; $i < $k; $i++) {
            $currentSum += $nums[$i];
        }
        $maxSum = $currentSum;
        for ($i = $k; $i < $numsCount; $i++) {
            // don't take into account the first element from the previous window for the current computation
            $currentSum += $nums[$i] - $nums[$i - $k];
            if ($currentSum > $maxSum) {
                $maxSum = $currentSum;
            }
        }

        return $maxSum / $k;
    }
}