<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/remove-element/
 */
class RemoveElement
{
    function removeElement(array &$nums, int $valueToRemove): int
    {
        $k = 0;
        $i = 0;
        $numsLength = count($nums);
        while ($i < $numsLength) {
            if ($nums[$i] !== $valueToRemove) {
                $nums[$k] = $nums[$i];
                $k++;
            }

            $i++;
        }

        return $k;
    }
}