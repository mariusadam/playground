<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/find-the-highest-altitude
 */
class FindTheHighestAltitude
{
    /**
     * @param array<int> $gain
     */
    public function largestAltitude(array $gain): int
    {
        $altitude = 0;
        $highestAltitude = 0;
        foreach ($gain as $pointGain) {
            $altitude += $pointGain;
            if ($altitude > $highestAltitude) {
                $highestAltitude = $altitude;
            }
        }

        return $highestAltitude;
    }
}