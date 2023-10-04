<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/3sum/
 */
class ThreeSum
{
    private array $nums;
    private int $numsLength;

    /**
     * @param array $nums
     * @return array<array<int>>
     */
    public function threeSum(array $nums): array
    {
        $this->nums = $nums;
        $this->numsLength = count($nums);
        sort($this->nums);
        
        $triplets = [];
        $knownTriplets = [];
        for ($i = 0; $i < $this->numsLength - 2; $i++) {
            foreach ($this->findIndexPairsWithSum(0 - $this->nums[$i], $i + 1) as $pair) {
                [$j, $k] = $pair;
                $foundTriplet = [$this->nums[$i], $this->nums[$j], $this->nums[$k]];
                $key = implode('_', $foundTriplet);
                if (isset($knownTriplets[$key])) {
                    continue;
                }
                $knownTriplets[$key] = true;
                $triplets[] = $foundTriplet;
            }
        }

        return $triplets;
    }

    /**
     * @return iterable<array<int>>
     */
    private function findIndexPairsWithSum(int $targetSum, int $startingFromIndex): iterable
    {
        $valueToIndexMap = [];
        for ($j = $startingFromIndex; $j < $this->numsLength; $j++) {
            $diff = $targetSum - $this->nums[$j];
            if (isset($valueToIndexMap[$diff])) {
                yield [$valueToIndexMap[$diff], $j];
            }
            $valueToIndexMap[$this->nums[$j]] = $j;
        }
    }
}