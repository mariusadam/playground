<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/kids-with-the-greatest-number-of-candies
 */
class KidsWithTheGreatestNumberOfCandies
{
    public function kidsWithCandies(array $candies, int $extraCandies): array
    {
        $maxCandies = 0;
        for ($i = 0; $i < count($candies); $i++) {
            if ($candies[$i] > $maxCandies) {
                $maxCandies = $candies[$i];
            }
        }

        $result = [];
        for ($i = 0; $i < count($candies); $i++) {
            $result[$i] = $candies[$i] + $extraCandies >= $maxCandies;
        }

        return $result;
    }
}