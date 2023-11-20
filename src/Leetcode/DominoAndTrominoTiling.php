<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/domino-and-tromino-tiling/
 */
class DominoAndTrominoTiling
{
    public function numTilings(int $n): int
    {
        $modulo = pow(10, 9) + 7;
        $values = [];
        $values[0] = 1;
        $values[1] = 2;
        $values[2] = 5;
        if ($n <= 3) {
            return $values[$n - 1];
        }
        $i = 3;
        while ($i < $n) {
            $current = (2 * $values[2] + $values[0]) % $modulo;
            $values[0] = $values[1];
            $values[1] = $values[2];
            $values[2] = $current;
            $i++;
        }

        return $values[2];
    }
}