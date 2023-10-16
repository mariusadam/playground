<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/increasing-triplet-subsequence
 */
class IncreasingTripletSubsequence
{
    public function increasingTriplet(array $nums): bool
    {
        $foundTriplet = false;
        $first = PHP_INT_MAX;
        $second = PHP_INT_MAX;
        foreach ($nums as $num) {
            if ($num <= $first) {
                $first = $num;
            } elseif ($num <= $second) {
                $second = $num;
            } elseif ($num > $second) {
                $foundTriplet = true;
                break;
            }
        }

        return $foundTriplet;
    }

    public function increasingTriplet2($nums)
    {
        $min = PHP_INT_MAX;
        $secMin = PHP_INT_MAX;

        foreach ($nums as $num) {
            if ($num <= $min) {
                $min = $num;
            } elseif ($num <= $secMin) {
                $secMin = $num;
            } elseif ($num > $secMin) {
                return true;
            }
        }

        return false;

    }
}