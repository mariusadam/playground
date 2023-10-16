<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/reverse-words-in-a-string
 */
class ReverseWordsInAString
{
    public function reverseWordsArrays(string $s): string
    {
        // split by space and rejoin the reversed list of words, time complexity O(n)
        $words = array_filter(explode(' ', $s), fn($w) => $w !== '');

        return implode(' ', array_reverse($words));
    }

    public function reverseWords(string $s): string
    {
        // reversing the words in-place, this implementation has O(n^2) time complexity
        $this->reverseString($s, 0, strlen($s) - 1);
        $this->reverseWordsInPlace($s);
        $this->removeExtraSpaces($s);

        return $s;
    }

    private function reverseWordsInPlace(string &$s): void
    {
        $stringLength = strlen($s);
        $i = 0;
        while ($i < $stringLength) {
            $startPos = $i;
            while ($i < $stringLength && $s[$i] !== ' ') {
                $i++;
            }
            $this->reverseString($s, $startPos, $i - 1);
            $i++;
        }
    }

    private function removeExtraSpaces(string &$s): void
    {
        $stringLength = strlen($s);
        $currentSlot = 0;
        // find first non space char
        $i = 0;
        while ($i < $stringLength && $s[$i] === ' ') {
            $i++;
        }
        while ($i < $stringLength) {
            while ($i < $stringLength - 1 && $s[$i] === ' ' && $s[$i + 1] === ' ') {
                // skip over extra spaces
                $i++;
            }
            if ($i === $stringLength - 1 && $s[$i] === ' ') {
                // last chat is space, skip it
                $i++;
                continue;
            }

            $s[$currentSlot] = $s[$i];
            $currentSlot++;
            $i++;
        }

        $s = substr($s, 0, $currentSlot);
    }

    private function reverseString(string &$s, int $startOffet, int $endOffset): void
    {
        $left = $startOffet;
        $right = $endOffset;
        while ($left < $right) {
            $this->swap($s, $left, $right);
            $left++;
            $right--;
        }
    }

    private function swap(string &$s, int $i, int $j): void
    {
        $tmp = $s[$i];
        $s[$i] = $s[$j];
        $s[$j] = $tmp;
    }
}