<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/move-zeroes/
 */
class MoveZeroes
{
    public function moveZeroes(array &$nums): void
    {
        $numsLength = count($nums);
        $targetPosition = 0;
        $i = 0;
        while ($i < $numsLength) {
            if ($nums[$i] !== 0) {
                $nums[$targetPosition] = $nums[$i];
                $targetPosition++;
            }

            $i++;
        }

        while ($targetPosition < $numsLength) {
            $nums[$targetPosition] = 0;
            $targetPosition++;
        }
    }

    public function moveZeroesMinimalOperations(array &$nums): void
    {
        $numsLength = count($nums);
        $targetPosition = 0;
        for ($i = 0; $i < $numsLength; $i++) {
            if ($nums[$i] !== 0) {
                // current element is non-zero, swap it with the element in the target posisiton
                $tmp = $nums[$targetPosition];
                $nums[$targetPosition] = $nums[$i];
                $nums[$i] = $tmp;
                $targetPosition++;
            }
        }
    }
}