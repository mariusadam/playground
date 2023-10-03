<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/container-with-most-water/
 */
class ContainerWithMostWater
{
    /**
     * @param array<int> $heights
     * @return int
     */
    public function maxArea(array $heights): int
    {
        $heightsCount = count($heights);
        $maxArea = 0;
        for ($i = 0; $i < $heightsCount - 1; $i++) {
            for ($j = 1; $j < $heightsCount; $j++) {
                $currentLength = min($heights[$i], $heights[$j]);
                $currentWidth = $j - $i;
                $currentArea = $currentLength * $currentWidth;
                $maxArea = max($maxArea, $currentArea);
            }
        }

        return $maxArea;
    }

    /**
     * @param array<int> $heights
     * @return int
     */
    public function maxAreaUsingPointers(array $heights): int
    {
        $left = 0;
        $right = count($heights) - 1;
        $maxArea = 0;
        while ($left < $right) {
            // assume the element denoted by left pointer is smallest and will advance left pointer
            $leftStep = 1;
            $rightStep = 0;
            $minHeight = $heights[$left];
            if ($minHeight > $heights[$right]) {
                // move the right side pointer and update the actual min height
                $leftStep = 0;
                $rightStep = -1;
                $minHeight = $heights[$right];
            }

            $currentLength = $minHeight;
            $currentWidth = $right - $left;
            $currentArea = $currentLength * $currentWidth;
            $maxArea = max($maxArea, $currentArea);

            $left += $leftStep;
            $right += $rightStep;
        }

        return $maxArea;
    }
}
