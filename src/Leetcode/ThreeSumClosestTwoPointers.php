<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/3sum-closest/
 */
class ThreeSumClosestTwoPointers
{
    /** @var array<int> */
    private array $sortedNums;

    private int $numsLength;

    /**
     * @param array<int> $nums
     * @param int $target
     * @return int
     */
    public function threeSumClosest(array $nums, int $target): int
    {
        $this->sortedNums = $nums;
        sort($this->sortedNums);
        $this->numsLength = count($nums);

        $closestTarget = PHP_INT_MAX;
        $closestTargetDiff = abs($target - $closestTarget);
        for ($i = 0; $i < $this->numsLength - 2; $i++) {
            $left = $i + 1;
            $right = $this->numsLength - 1;
            while ($left < $right) {
                $currentTarget = $this->sortedNums[$i] + $this->sortedNums[$left] + $this->sortedNums[$right];
                $currentTargetDiff = abs($target - $currentTarget);
                if ($currentTargetDiff < $closestTargetDiff) {
                    $closestTarget = $currentTarget;
                    $closestTargetDiff = $currentTargetDiff;
                }
                if ($closestTarget === $target) {
                    return $closestTarget;
                }
                if ($currentTarget > $target) {
                    // use a smaller number next time if the current target is too big
                    $right--;
                } else {
                    // use a bigger number otherwise
                    $left++;
                }
            }
        }

        return $closestTarget;
    }
}
