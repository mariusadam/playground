<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/binary-search/
 */
class BinarySearch
{
    public function search(array $nums, int $target): int
    {
        return $this->doBinarySearch($nums, $target, 0, count($nums) - 1);
    }

    private function doBinarySearch(array $nums, int $target, int $left, int $right): int
    {
        if ($left >= $right) {
            return -1;
        }

        $middle = intdiv($left + $right, 2);
        if ($nums[$middle] === $target) {
            return $middle;
        }

        if ($nums[$middle] > $target) {
            return $this->doBinarySearch($nums, $target, $left, $middle - 1);
        }

        return $this->doBinarySearch($nums, $target, $middle + 1, $right);
    }
}