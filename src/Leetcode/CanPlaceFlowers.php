<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/can-place-flowers
 */
class CanPlaceFlowers
{
    public function canPlaceFlowers(array $flowerbed, int $n): bool
    {
        $placedFlowers = 0;
        $i = 0;
        while ($i < count($flowerbed) && $placedFlowers < $n) {
            $hasFlowerToTheLeft = $i > 0 && $flowerbed[$i - 1] === 1;
            $hasFlowerToTheRight = $i < count($flowerbed) - 1 && $flowerbed[$i + 1] === 1;
            $placedNewFlower = false;
            if ($flowerbed[$i] === 0 && !$hasFlowerToTheLeft && !$hasFlowerToTheRight) {
                $placedFlowers++;
                $placedNewFlower = true;
            }

            $step = 1;
            if ($placedNewFlower || $flowerbed[$i] === 1) {
                $step = 2;
            }

            $i += $step;
        }

        return $placedFlowers === $n;
    }
}