<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/product-of-array-except-self
 */
class ProductOfArrayExceptSelf
{
    public function productExceptSelf(array $nums): array
    {
        $resultLeft = array_fill(0, count($nums), 1);
        $resultRight = array_fill(0, count($nums), 1);
        for ($i = 1; $i < count($nums); $i++) {
            $resultLeft[$i] = $nums[$i - 1] * $resultLeft[$i - 1];
        }
        for ($i = count($nums) - 2; $i >= 0; $i--) {
            $resultRight[$i] = $nums[$i + 1] * $resultRight[$i + 1];
        }

        $result = [];
        for ($i = 0; $i < count($nums); $i++) {
            $result[$i] = $resultLeft[$i] * $resultRight[$i];
        }

        return $result;
    }
}