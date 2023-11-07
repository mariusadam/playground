<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/kth-largest-element-in-an-array
 */
class KthLargestElementInAnArray
{
    /**
     * @param array<int>
     */
    public function findKthLargest(array $nums, int $k): int
    {
        $heap = new \SplMinHeap();
        $i = 0;
        while ($i < $k) {
            $heap->insert($nums[$i]);
            $i++;
        }
        
        while ($i < count($nums)) {
            if ($nums[$i] > $heap->top()) {
                $heap->extract();
                $heap->insert($nums[$i]);
            }
            $i++;
        }

        return $heap->top();
    }
}