<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/equal-row-and-column-pairs
 */
class EqualRowAndColumnPairs
{
    /**
     * @param array<array<int>>
     */
    public function equalPairs(array $grid): int
    {
        $numberOfPairs = 0;
        $n = count($grid);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $equals = true;
                for ($k = 0; $k < $n; $k++) {
                    if ($grid[$i][$k] !== $grid[$k][$j]) {
                        $equals = false;
                        break;
                    }
                }
                if ($equals) {
                    $numberOfPairs++;
                }
            }
        }

        return $numberOfPairs;
    }

    /**
     * Implements the comparison of row i and column j using pre-computed hashes for each array to reduce the time complexity to O(n^2)
     * 
     * @param array<array<int>>
     */
    public function equalPairsUsingHash(array $grid): int
    {
        $n = count($grid);
        $rowHashes = [];
        $columnHashes = [];
        for ($i = 0; $i < $n; $i++) {
            $rowHash = hash('sha256', implode(',', $grid[$i]));
            $rowHashes[$rowHash] = ($rowHashes[$rowHash] ?? 0) + 1;

            $columnArray = [];
            for ($j = 0; $j < $n; $j++) {
                $columnArray[] = $grid[$j][$i];
            }
            $columnHash = hash('sha256', implode(',', $columnArray));
            $columnHashes[$columnHash] = ($columnHashes[$columnHash] ?? 0) + 1;
        }

        $numberOfPairs = 0;
        foreach ($rowHashes as $hash => $rowsCount) {
            $matchingColumnsCount = $columnHashes[$hash] ?? 0;
            $numberOfPairs += $rowsCount * $matchingColumnsCount;
        }

        return $numberOfPairs;
    }
}