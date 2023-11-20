<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/unique-paths/
 */
class UniquePaths
{
    public function uniquePaths(int $m, int $n): int
    {
        $previousRow = array_fill(0, $n + 1, 0);
        for ($i = 1; $i <= $m; $i++) {
            for ($j = 1; $j <= $n; $j++) {
                if ($i === 1 && $j === 1) {
                    $previousRow[1] = 1;
                    continue;
                }

                $previousRow[$j] = $previousRow[$j - 1] + $previousRow[$j];
            }
        }

        return $previousRow[$n];
    }
}