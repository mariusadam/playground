<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/unique-number-of-occurrences
 */
class UniqueNumberOfOccureneces
{
    /**
     * @param array<int> $arr
     */
    public function uniqueOccurrencesUsingArrayCount(array $arr): bool
    {
        // count the number of times each value appears in the input array
        $valuesMap = array_count_values($arr);

        // the count again how many times a given count appeared
        $countMap = array_count_values($valuesMap);

        // finally, we know we had an unique number of occurence if each count appears once and only once
        return max($countMap) === 1;
    }

    /**
     * @param array<int> $arr
     */
    public function uniqueOccurrencesUsingStopCondition(array $arr): bool
    {
        $valuesMap = array_count_values($arr);

        $countMap = [];
        foreach ($valuesMap as $count) {
            if (isset($countMap[$count])) {
                return false;
            }

            $countMap[$count] = true;
        }

        return true;
    }
}