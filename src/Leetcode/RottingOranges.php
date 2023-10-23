<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/rotting-oranges
 */
class RottingOranges
{
    /**
     * @param array<array<int>>
     */
    public function orangesRotting(array $grid): int
    {
        $m = count($grid);
        $n = count($grid[0]);
        $queue = new \SplQueue();
        $visited = [];
        $freshOrangesCount = 0;
        for ($i = 0; $i < $m; $i++) {
            for ($j = 0; $j < $n; $j++) {
                if ($grid[$i][$j] === 2) {
                    $queue->enqueue([$i, $j, 0]);
                    $visited[$i][$j] = true;
                } elseif ($grid[$i][$j] === 1) {
                    $freshOrangesCount++;
                }
            }
        }

        $directions = [
            [-1, 0],
            [0, 1],
            [1, 0],
            [0, -1],
        ];
        $maxMinute = 0;
        while (!$queue->isEmpty()) {
            [$i, $j, $minute] = $queue->dequeue();
            $maxMinute = max($maxMinute, $minute);

            foreach ($directions as [$di, $dj]) {
                $nextI = $i + $di;
                $nextJ = $j + $dj;
                if ($nextI < 0 || $nextI >= $m || $nextJ < 0 || $nextJ >= $n) {
                    continue;
                }
                if ($visited[$nextI][$nextJ] ?? false) {
                    continue;
                }
                if ($grid[$nextI][$nextJ] === 0) {
                    continue;
                }

                $visited[$nextI][$nextJ] = true;
                $queue->enqueue([$nextI, $nextJ, $minute + 1]);
                $freshOrangesCount--;
            }
        }

        // check for remaining fresh oranges
        if ($freshOrangesCount > 0) {
            // could not reach all cells
            return -1;
        }

        return $maxMinute;
    }
}