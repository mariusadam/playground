<?php

namespace App\Leetcode;

class GuessGame
{
    public function __construct(private int $pick)
    {
    }

    public function guess(int $num): int
    {
        return $this->pick <=> $num;
    }
}

/**
 * @link https://leetcode.com/problems/guess-number-higher-or-lower
 */
class GuessNumberHigherOrLower extends GuessGame
{
    public function guessNumber($n): int
    {
        return $this->guessUsingBinarySearch(1, $n);
    }

    private function guessUsingBinarySearch(int $left, int $right): int
    {
        $mid = intdiv($left + $right, 2);
        $guess = $this->guess($mid);
        if ($guess === 0) {
            return $mid;
        }
        if ($guess > 0) {
            return $this->guessUsingBinarySearch($mid + 1, $right);
        }

        return $this->guessUsingBinarySearch($left, $mid - 1);
    }
}