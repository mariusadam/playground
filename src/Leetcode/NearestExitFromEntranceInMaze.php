<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/nearest-exit-from-entrance-in-maze
 */
class NearestExitFromEntranceInMaze
{
    /**
     * @param array<array<string>>
     */
    public function nearestExit(array $maze, array $entrance): int
    {
        $queue = new \SplQueue();
        $queue->enqueue($entrance);
        $m = count($maze);
        $n = count($maze[0]);
        $distances[$entrance[0]][$entrance[1]] = 0;
        while (!$queue->isEmpty()) {
            [$i, $j] = $queue->dequeue();
            $currentDistance = $distances[$i][$j];
            foreach ($this->getNextCells($m, $n, $i, $j) as [$nextI, $nextJ]) {
                if ($maze[$nextI][$nextJ] === '+') {
                    // hit a wall, cannot advance in this direction
                    continue;
                }
                if (isset($distances[$nextI][$nextJ])) {
                    // already visited
                    continue;
                }

                if ($nextI === 0 || $nextI === $m - 1 || $nextJ === 0 || $nextJ === $n - 1) {
                    return $currentDistance + 1;
                }

                $distances[$nextI][$nextJ] = $currentDistance + 1;
                $queue->enqueue([$nextI, $nextJ]);
            }
        }

        return -1;
    }

    private function getNextCells(int $m, int $n, int $i, int $j): iterable
    {
        if ($i > 0) {
            yield [$i - 1, $j];
        }
        if ($j < $n - 1) {
            yield [$i, $j + 1];
        }
        if ($i < $m - 1) {
            yield [$i + 1, $j];
        }
        if ($j > 0) {
            yield [$i, $j - 1];
        }
    }
}