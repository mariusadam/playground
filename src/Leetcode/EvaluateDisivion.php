<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/evaluate-division
 */
class EvaluateDisivion
{
    /**
     * @param array<array<string>> $equations
     * @param array<array<float>> $values
     * @param array<array<string>> $queries
     * @return array<array<float>>
     */
    public function calcEquation(array $equations, array $values, array $queries): array
    {
        $distances = [];
        for ($i = 0; $i < count($equations); $i++) {
            [$src, $dest] = $equations[$i];
            $ratio = $values[$i];
            $distances[$src][$dest] = $ratio;
            $distances[$dest][$src] = 1 / $ratio;
            $distances[$src][$src] = 1;
            $distances[$dest][$dest] = 1;
        }

        // apply Floyd-Warshall to get shortest paths between all nodes
        $nodes = array_keys($distances);
        foreach ($nodes as $intermediate) {
            foreach ($nodes as $src) {
                foreach ($nodes as $dest) {
                    if ($intermediate === $src || $intermediate === $dest) {
                        continue;
                    }
                    $d1 = $distances[$src][$intermediate] ?? null;
                    $d2 = $distances[$intermediate][$dest] ?? null;
                    if (null === $d1 || null === $d2) {
                        continue;
                    }
                    $current = $distances[$src][$dest] ?? PHP_FLOAT_MAX;
                    $newDistance = $d1 * $d2;
                    if ($current > $newDistance) {
                        $distances[$src][$dest] = $newDistance;
                    }
                }
            }
        }

        $results = [];
        foreach ($queries as [$src, $target]) {
            $results[] = round($distances[$src][$target] ?? -1, 5);
        }

        return $results;
    }
}