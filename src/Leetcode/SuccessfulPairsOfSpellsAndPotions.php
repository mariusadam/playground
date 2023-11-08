<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/successful-pairs-of-spells-and-potions/
 */
class SuccessfulPairsOfSpellsAndPotions
{
    /**
     * @param array<int> $spells
     * @param array<int> $potions
     * @return array<int>
     */
    public function successfulPairs(array $spells, array $potions, int $success): array
    {
        sort($potions);
        $potionsCount = count($potions);
        $pairs = [];
        foreach ($spells as $spell) {
            $rank = $this->findRank($potions, $spell, $success, $potionsCount);
            // number of pairs is the total number of potions - the number of potions for which the strength is less than the given threshold
            $pairs[] = $potionsCount - $rank;
        }

        return $pairs;
    }

    /**
     * Returns the number of potions for which the strength is less than the given threshold ($success)
     */
    private function findRank(array $potions, int $spell, $success, int $potionsCount): int
    {
        $left = 0;
        $right = $potionsCount;
        while ($left < $right) {
            $mid = intdiv($left + $right, 2);
            $midStrength = $potions[$mid] * $spell;
            if ($midStrength < $success) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $left;
    }
}
