<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/4sum/
 */
class FourSum
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

        $i = 0;
        $quadruplets = [];
        while ($i < $this->numsLength - 3) {
            foreach ($this->findTriplets($target - $this->sortedNums[$i], $i + 1) as [$j, $k, $l]) {
                $currentQuadruplet = [
                    $this->sortedNums[$i],
                    $this->sortedNums[$j],
                    $this->sortedNums[$k],
                    $this->sortedNums[$l],
                ];
                $quadruplets[] = $currentQuadruplet;
            }
            $oldI = $i;
            while ($i < $this->numsLength - 3 && $this->sortedNums[$i] === $this->sortedNums[$oldI]) {
                $i++;
            }
        }

        return $quadruplets;
    }


    /**
     * @return iterable<array<int>>
     */
    private function findTriplets(int $target, int $startingFromIndex): iterable
    {
        $i = $startingFromIndex;
        while ($i < $this->numsLength - 2) {
            foreach ($this->findTuples($target - $this->sortedNums[$i], $i + 1) as [$j, $k]) {
                yield [$i, $j, $k];
            }
            $oldI = $i;
            while ($i < $this->numsLength - 2 && $this->sortedNums[$i] === $this->sortedNums[$oldI]) {
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
