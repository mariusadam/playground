<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/find-pivot-index
 */
class FindThePivotIndex
{
    /**
     * @param array<int> $nums
     */
    public function pivotIndex(array $nums): int
    {
        $numsCount = count($nums);
        $leftSum = array_fill(0, $numsCount, 0);
        $rightSum = array_fill(0, $numsCount, 0);
        for ($i = 1; $i < $numsCount; $i++) {
            $leftSum[$i] = $leftSum[$i - 1] + $nums[$i - 1];
        }
        for ($i = $numsCount - 2; $i >= 0; $i--) {
            $rightSum[$i] = $rightSum[$i + 1] + $nums[$i + 1];
        }

        $pivotIndex = -1;
        for ($i = 0; $i < $numsCount; $i++) {
            if ($leftSum[$i] === $rightSum[$i]) {
                $pivotIndex = $i;
                break;
            }
        }

        return $pivotIndex;
    }
}