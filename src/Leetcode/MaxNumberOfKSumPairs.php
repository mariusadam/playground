<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/max-number-of-k-sum-pairs
 */
class MaxNumberOfKSumPairs
{
    /**
     * @param array<int> $nums
     */
    public function maxOperations(array $nums, int $k): int
    {
        $map = [];
        $sumsCount = 0;
        $numsCount = count($nums);
        for ($i = 0; $i < $numsCount; $i++) {
            $diff = $k - $nums[$i];
            if (!empty($map[$diff])) {
                $sumsCount++;
                $map[$diff]--;
                continue;
            }
            $map[$nums[$i]] = ($map[$nums[$i]] ?? 0) + 1;
        }

        return $sumsCount;
    }
}