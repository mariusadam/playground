<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/number-of-provinces/
 */
class NumberOfProvinces
{
    public function findCircleNum(array $isConnected): int
    {
        $visited = array_fill(0, count($isConnected), false);
        $numberOfProvinces = 0;
        for ($i = 0; $i < count($isConnected); $i++) {
            if ($visited[$i]) {
                continue;
            }

            $this->visit($isConnected, $i, $visited);
            $numberOfProvinces++;
        }

        return $numberOfProvinces;
    }

    private function visit(array $isConnected, int $city, array &$visited): void
    {
        if ($visited[$city]) {
            return;
        }

        $visited[$city] = true;
        for ($i = 0; $i < count($isConnected); $i++) {
            if ($isConnected[$city][$i] === 1) {
                $this->visit($isConnected, $i, $visited);
            }
        }
    }
}