<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/house-robber/
 */
class HouseRobber
{
    /**
     * @param array<int> $nums
     */
    public function rob(array $nums): int
    {
        $prev1 = 0;
        $prev2 = 0;
        foreach ($nums as $num) {
            $tmp = max($prev1, $prev2 + $num);
            $prev2 = $prev1;
            $prev1 = $tmp;
        }

        return $prev1;
    }
}
