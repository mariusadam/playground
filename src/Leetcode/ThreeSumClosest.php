<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/3sum-closest/
 *
 * This solution sorts the input array and uses binary search for finding the value that gives the closest sum after
 * fixing 2 of the values
 */
class ThreeSumClosest
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
        for ($i = 0; $i < $this->numsLength - 2; $i++) {
            foreach ($this->findClosestPairs($target - $this->sortedNums[$i], $i + 1) as [$j, $k]) {
                $currentTarget = $this->sortedNums[$i] + $this->sortedNums[$j] + $this->sortedNums[$k];
                $currentTargetDiff = abs($target - $currentTarget);
                $closestTargetDiff = abs($target - $closestTarget);
                if ($currentTargetDiff < $closestTargetDiff) {
                    $closestTarget = $currentTarget;
                }
            }
        }

        return $closestTarget;
    }

    /**
     * @return iterable<int>
     */
    private function findClosestPairs(int $target, int $startingFromIndex): iterable
    {
        for ($i = $startingFromIndex; $i < $this->numsLength - 1; $i++) {
            $diff = $target - $this->sortedNums[$i];
            $closestIndex = $this->findClosestValueBetweenIndices($diff, $i + 1, $this->numsLength - 1);
            yield [$i, $closestIndex];
        }
    }

    private function findClosestValueBetweenIndices(int $target, int $left, int $right): int
    {
        if ($left >= $right - 1) {
            $diffLeft = $target - $this->sortedNums[$left];
            $diffRight = $target - $this->sortedNums[$right];
            return abs($diffLeft) < abs($diffRight) ? $left : $right;
        }

        $middle = intdiv($left + $right, 2);
        if ($this->sortedNums[$middle] > $target) {
            return $this->findClosestValueBetweenIndices($target, $left, $middle);
        }

        return $this->findClosestValueBetweenIndices($target, $middle, $right);
    }
}
