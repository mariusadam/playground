<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/remove-duplicates-from-sorted-array/
 */
class RemoveKDuplicatesFromSortedArray
{
    public function removeDuplicates(array &$nums): int
    {
        $k = 0;
        $i = 0;
        $numsLength = count($nums);
        while ($i < $numsLength) {
            $value = $nums[$i];
            while ($i < $numsLength && $nums[$i] === $value) {
                $i++;
            }

            $nums[$k] = $value;
            $k++;
        }

        return $k;
    }
}