<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/4sum/
 *
 * Generalized k-sum problem solution using generators and a stop condition in case the sum cannot be completed
 */
class FourSumGeneralized
{
    /** @var array<int> */
    private array $sortedNums;

    private int $numsLength;

    /**
     * @param array<int> $nums
     * @param int $target
     * @return array<array<int>>
     */
    public function fourSum(array $nums, int $target): array
    {
        $this->sortedNums = $nums;
        sort($this->sortedNums);
        $this->numsLength = count($nums);

        return $this->computeKSumValues($target, 4);
    }

    private function computeKSumValues(int $target, int $k): array
    {
        $result = [];
        foreach ($this->kSum($target, 0, $k) as $indices) {
            $currentValues = [];
            foreach ($indices as $index) {
                $currentValues[] = $this->sortedNums[$index];
            }
            $result[] = $currentValues;
        }

        return $result;
    }

    /**
     * @return iterable<array<int>>
     */
    private function kSum(int $target, int $startingFromIndex, int $k): iterable
    {
        $averageValue = $target / $k;
        $biggestValue = $this->sortedNums[$this->numsLength - 1];
        $smallestValue = $this->sortedNums[$startingFromIndex];
        if ($smallestValue > $averageValue || $biggestValue < $averageValue) {
            // early return in case the sum cannot be completed
            return;
        }

        if (2 === $k) {
            yield from $this->findTuples($target, $startingFromIndex);
            return;
        }

        $i = $startingFromIndex;
        while ($i <= $this->numsLength - $k) {
            foreach ($this->kSum($target - $this->sortedNums[$i], $i + 1, $k - 1) as $indices) {
                yield array_merge([$i], $indices);
            }

            $oldI = $i;
            while ($i <= $this->numsLength - $k && $this->sortedNums[$i] === $this->sortedNums[$oldI]) {
                $i++;
            }
        }
    }

    /**
     * @return iterable<array<int>>
     */
    private function findTuples(int $target, int $startingFromIndex): iterable
    {
        $left = $startingFromIndex;
        $right = $this->numsLength - 1;
        while ($left < $right) {
            $currentSum = $this->sortedNums[$left] + $this->sortedNums[$right];
            if ($currentSum < $target) {
                $left++;
                continue;
            }
            if ($currentSum > $target) {
                $right--;
                continue;
            }

            // currentSum is equal to target
            yield [$left, $right];
            $oldLeft = $left;
            $oldRight = $right;
            while ($left < $right && $this->sortedNums[$left] === $this->sortedNums[$oldLeft]) {
                $left++;
            }
            while ($left < $right && $this->sortedNums[$right] === $this->sortedNums[$oldRight]) {
                $right--;
            }
        }
    }
}
