<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/combination-sum-iii/
 */
class CombinationSum3
{
    /**
     * @return array<array<int>>
     */
    public function combinationSum3(int $k, int $n): array
    {
        $combinations = [];
        $solution = array_fill(0, $k, 0);
        $level = 0;
        $sum = 0;
        while ($level >= 0) {
            // update the sum as we build the solution
            $sum -= $solution[$level];
            $previous = $level > 0 ? $solution[$level - 1] : 0;
            $solution[$level] = max($previous + 1, $solution[$level] + 1);
            $sum += $solution[$level];
            if ($solution[$level] > 9) {
                $sum -= $solution[$level];
                $solution[$level] = 0;
                $level--;
                continue;
            }
            if ($level + 1 < $k) {
                $level++;
                continue;
            }

            if ($sum === $n) {
                $combinations[] = $solution;
            }
            if ($sum >= $n) {
                // since we reached or exceeded the sum, there's no point in continuing at the current level
                $sum -= $solution[$level];
                $solution[$level] = 0;
                $level--;
            }
        }

        return $combinations;
    }
}