<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/maximum-subsequence-score
 */
class MaximumSubsequenceScore
{
    /**
     * @param array<int> $nums1
     * @param array<int> $nums2
     */
    public function maxScore(array $nums1, array $nums2, int $k): int
    {
        $n = count($nums1);
        $combined = [];
        for ($i = 0; $i < $n; $i++) {
            $combined[] = [
                'num1' => $nums1[$i],
                'num2' => $nums2[$i],
                'index' => $i,
            ];
        }
        usort(
            $combined,
            fn($a, $b) => $b['num2'] - $a['num2'],
        );

        $i = 0;
        $sum = 0;
        $minHeap = new \SplMinHeap();
        while ($i < $k) {
            $sum += $combined[$i]['num1'];
            $minHeap->insert($combined[$i]['num1']);
            $i++;
        }
        $max = $sum * $combined[$k - 1]['num2'];
        while ($i < $n) {
            $minNum1 = $minHeap->extract();
            $sum = $sum - $minNum1 + $combined[$i]['num1'];
            $minHeap->insert($combined[$i]['num1']);
            $currentScore = $sum * $combined[$i]['num2'];
            if ($currentScore > $max) {
                $max = $currentScore;
            }
            $i++;
        }

        return $max;
    }
}
