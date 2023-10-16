<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/merge-strings-alternately
 */
class MergeStringAlternatively
{
    public function mergeAlternately(string $word1, string $word2): string
    {
        $result = '';
        $word1Length = strlen($word1);
        $word2Length = strlen($word2);

        $i = 0;
        $j = 0;
        while ($i < $word1Length && $j < $word2Length) {
            $result .= $word1[$i] . $word2[$j];
            $i++;
            $j++;
        }

        if ($i < $word1Length) {
            $result .= substr($word1, $i);
        }
        if ($j < $word2Length) {
            $result .= substr($word2, $j);
        }

        return $result;
    }
}