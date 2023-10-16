<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/determine-if-two-strings-are-close
 */
class DetermineIfTwoStringsAreClose
{
    public function closeStrings(string $word1, string $word2): bool
    {
        if (strlen($word1) !== strlen($word2)) {
            return false;
        }

        $letterFreqWord1 = $this->buildLetterFrequencyMap($word1);
        $letterFreqWord2 = $this->buildLetterFrequencyMap($word2);

        return $this->wordsContainSameLetters($letterFreqWord1, $letterFreqWord2)
            && $this->wordsContainSameFrequencies($letterFreqWord1, $letterFreqWord2);
    }

    private function buildLetterFrequencyMap(string $word): array
    {
        $map = [];
        $wordLength = strlen($word);
        for ($i = 0; $i < $wordLength; $i++) {
            $map[$word[$i]] = ($map[$word[$i]] ?? 0) + 1;
        }

        return $map;
    }

    private function wordsContainSameLetters(array $letterFreqWord1, array $letterFreqWord2): bool
    {
        $lettersWord1 = array_keys($letterFreqWord1);
        $lettersWord2 = array_keys($letterFreqWord2);

        return array_diff($lettersWord1, $lettersWord2) === [] && array_diff($lettersWord2, $lettersWord1) === [];
    }

    private function wordsContainSameFrequencies(array $letterFreqWord1, array $letterFreqWord2): bool
    {
        $frequencyCountWord1 = array_count_values($letterFreqWord1);
        $frequencyCountWord2 = array_count_values($letterFreqWord2);
        // check that we have the same number of frequencies in both words
        foreach ($frequencyCountWord1 as $freq1 => $count1) {
            $count2 = $frequencyCountWord2[$freq1] ?? 0;
            if ($count1 !== $count2) {
                return false;
            }
        }

        return true;
    }
}