<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/number-of-recent-calls
 */
class RecentCounter
{
    private \SplQueue $timeStamps;

    public function __construct()
    {
        $this->timeStamps = new \SplQueue();
    }

    public function ping(int $t): int
    {
        $minThreshold = $t - 3000;
        while (!$this->timeStamps->isEmpty() && $this->timeStamps->bottom() < $minThreshold) {
            $this->timeStamps->dequeue();
        }
        $this->timeStamps->enqueue($t);

        return $this->timeStamps->count();
    }
}
