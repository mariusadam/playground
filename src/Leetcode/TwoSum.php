<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/two-sum/
 */
class TwoSum
{
    /**
     * @param array<int> $nums
     * @param int $target
     * @return array<int>
     */
    public function twoSum(array $nums, int $target): array
    {
        for ($i = 0; $i < count($nums) - 1; $i++) {
            for ($j = $i + 1; $j < count($nums); $j++) {
                if ($nums[$i] + $nums[$j] === $target) {
                    return [$i, $j];
                }
            }
        }

        return [];
    }

    /**
     * @param array<int> $nums
     * @param int $target
     * @return array<int>
     */
    public function twoSumMap(array $nums, int $target): array
    {
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            $diff = $target - $nums[$i];
            if (isset($map[$diff])) {
                return [$map[$diff], $i];
            }

            $map[$nums[$i]] = $i;
        }

        return [];
    }
}
