<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/koko-eating-bananas/
 */
class KokoEatingBananas
{
    /**
     * @param array<int> $piles
     * @param int $h
     * @return int
     */
    public function minEatingSpeed(array $piles, int $h): int
    {
        $sum = array_sum($piles);
        $left = (int) ceil($sum / $h);
        $right = max($piles);
        $minSpeed = $right;
        while ($left <= $right) {
            $mid = intdiv($left + $right, 2);
            $comparison = $this->compareRequiredHours($piles, $h, $mid);
            if ($comparison <= 0) {
                $right = $mid - 1;
                $minSpeed = min($minSpeed, $mid);
            } elseif ($comparison > 0) {
                $left = $mid + 1;
            }
        }

        return $minSpeed;
    }

    private function compareRequiredHours(array $piles, int $h, int $speed): int
    {
        $requiredHours = 0;
        foreach ($piles as $pile) {
            $requiredHours += ceil($pile / $speed);
            if ($requiredHours > $h) {
                return 1;
            }
        }

        return $requiredHours === $h ? 0 : -1;
    }
}