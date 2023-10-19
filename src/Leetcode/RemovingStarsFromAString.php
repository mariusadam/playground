<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/removing-stars-from-a-string
 */
class RemovingStarsFromAString
{
    public function removeStars(string $s): string
    {
        $charStack = [];
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] !== '*') {
                $charStack[] = $s[$i];
                continue;
            }

            array_pop($charStack); // remove closest non-star character
        }

        return implode('', $charStack);
    }
}