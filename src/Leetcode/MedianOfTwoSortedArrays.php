<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/median-of-two-sorted-arrays/
 */
class MedianOfTwoSortedArrays
{
    /**
     * @param array<int> $nums1
     * @param array<int> $nums2
     * @return float
     */
    public function findMedianSortedArrays(array $nums1, array $nums2): float
    {
        $i1 = 0;
        $i2 = 0;
        $mergedNums = [];
        while ($i1 < count($nums1) || $i2 < count($nums2)) {
            if ($i1 === count($nums1)) {
                $mergedNums[] = $nums2[$i2];
                $i2++;
                continue;
            }
            if ($i2 === count($nums2)) {
                $mergedNums[] = $nums1[$i1];
                $i1++;
                continue;
            }

            if ($nums1[$i1] < $nums2[$i2]) {
                $mergedNums[] = $nums1[$i1];
                $i1++;
            } else {
                $mergedNums[] = $nums2[$i2];
                $i2++;
            }
        }

        if (count($mergedNums) % 2 === 0) {
            $medianPosition = intdiv(count($mergedNums), 2) - 1;
            $median = ($mergedNums[$medianPosition] + $mergedNums[$medianPosition + 1]) / 2;
        } else {
            $medianPosition = intdiv(count($mergedNums), 2);
            $median = $mergedNums[$medianPosition];
        }

        return $median;
    }
}