<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/total-cost-to-hire-k-workers
 */
class TotalCostToHireKWorkers
{
    /**
     * @param array<int> $costs
     */
    public function totalCost(array $costs, int $k, int $candidates): int
    {
        $cost = 0;
        $left = 0;
        $leftHeap = new \SplMinHeap();
        $right = count($costs) - 1;
        $rightHeap = new \SplMinHeap();
        while ($left < $candidates && $left < $right) {
            $leftHeap->insert([$costs[$left], $left]);
            $rightHeap->insert([$costs[$right], $right]);
            $left++;
            $right--;
        }
        if ($leftHeap->isEmpty()) {
            return $costs[0];
        }

        for ($i = 0; $i < $k; $i++) {
            if ($leftHeap->isEmpty()) {
                $cost += $rightHeap->extract()[0];
            } elseif ($rightHeap->isEmpty()) {
                $cost += $leftHeap->extract()[0];
            } elseif ($leftHeap->top() <= $rightHeap->top()) {
                $cost += $leftHeap->extract()[0];
                if ($left <= $right) {
                    $leftHeap->insert([$costs[$left], $left]);
                    $left++;
                }
            } else {
                $cost += $rightHeap->extract()[0];
                if ($right >= $left) {
                    $rightHeap->insert([$costs[$right], $right]);
                    $right--;
                }
            }
        }

        return $cost;
    }
}