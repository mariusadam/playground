<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/min-cost-climbing-stairs/
 */
class MinCostClimbingStairs
{
    /**
     * @param array<int>
     */
    public function minCostClimbingStairs(array $cost): int
    {
        $n = count($cost);
        $computedCosts = array_fill(0, $n, 0);
        $computedCosts[$n - 1] = $cost[$n - 1];
        $computedCosts[$n - 2] = $cost[$n - 2];
        for ($i = $n - 3; $i >= 0; $i--) {
            $computedCosts[$i] = $cost[$i] + min($computedCosts[$i + 1], $computedCosts[$i + 2]);
        }

        return min($computedCosts[0], $computedCosts[1]);
    }
}