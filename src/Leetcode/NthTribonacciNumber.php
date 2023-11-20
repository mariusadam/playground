<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/n-th-tribonacci-number/
 */
class NthTribonacciNumber
{
    public function tribonacci(int $n): int
    {
        $t = [0, 1, 1];
        if ($n <= 2) {
            return $t[$n];
        }

        $result = 0;
        $i = 3;
        while ($i <= $n) {
            $result = $t[0] + $t[1] + $t[2];
            $t[0] = $t[1];
            $t[1] = $t[2];
            $t[2] = $result;
            $i++;
        }

        return $result;
    }
}