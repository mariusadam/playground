<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/find-the-difference-of-two-arrays/
 */
class FindTheDifferenceOfTwoArrays
{
    /**
     * @param array<int> $nums1
     * @param array<int> $nums2
     */
    public function findDifference(array $nums1, array $nums2): array
    {
        return [
            $this->arrayDiff($nums1, $nums2),
            $this->arrayDiff($nums2, $nums1),
        ];
    }

    private function arrayDiff(array $first, array $second): array
    {
        $diff = [];
        $secondMap = array_count_values($second);
        foreach ($first as $elem) {
            if (!isset($diff[$elem]) && !isset($secondMap[$elem])) {
                $diff[$elem] = true;
            }
        }

        return array_keys($diff);
    }
}