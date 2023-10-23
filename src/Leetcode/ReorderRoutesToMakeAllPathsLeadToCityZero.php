<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/reorder-routes-to-make-all-paths-lead-to-the-city-zero
 */
class ReorderRoutesToMakeAllPathsLeadToCityZero
{
    public function minReorder(int $n, array $connections): int
    {
        $directedConnections = array_fill(0, $n, []);
        $undirectedConnections = array_fill(0, $n, []);
        $visited = array_fill(0, $n, false);
        foreach ($connections as $connection) {
            [$source, $destination] = $connection;
            $directedConnections[$source][$destination] = true;
            $undirectedConnections[$source][] = $destination;
            $undirectedConnections[$destination][] = $source;
        }

        return $this->visit($directedConnections, $undirectedConnections, 0, $visited);
    }

    private function visit(array $directedConnections, array $undirectedConnections, int $node, array &$visited): int
    {
        $reorder = 0;
        $visited[$node] = true;
        foreach ($undirectedConnections[$node] as $next) {
            if ($visited[$next]) {
                continue;
            }
            if ($directedConnections[$node][$next] ?? false) {
                $reorder++;
            }
            $reorder += $this->visit($directedConnections, $undirectedConnections, $next, $visited);
        }

        return $reorder;
    }
}