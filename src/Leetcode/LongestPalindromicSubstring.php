<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/longest-palindromic-substring/
 */
class LongestPalindromicSubstring
{
    public function longestPalindrome(string $input): string
    {
        $maxLength = 0;
        $startIndex = -1;
        $endIndex = -1;
        for ($i = 0; $i < strlen($input) - 1; $i++) {
            if (strlen($input) - $i < $maxLength) {
                break;
            }

            for ($j = strlen($input) - 1; $j >= $i + 1; $j--) {
                $currentLength = $j - $i + 1;
                if ($currentLength > $maxLength && $input[$i] === $input[$j] && $this->isPalindrome($input, $i, $j)) {
                    $maxLength = $currentLength;
                    $startIndex = $i;
                    $endIndex = $j;
                }
            }
        }

        return substr($input, $startIndex, $endIndex - $startIndex + 1);
    }

    private function isPalindrome(string $input, int $start, int $end): bool
    {
        $middle = intdiv($end + $start, 2);
        for ($i = $start; $i <= $middle; $i++) {
            $mirrorPosition = $end - ($i - $start);
            if ($input[$i] !== $input[$mirrorPosition]) {
                return false;
            }
        }

        return true;
    }

    public function longestPalindromeV2(string $input): string
    {
        $maxLength = 0;
        $startPos = -1;
        $endPos = -1;
        $inputLength = strlen($input);
        for ($i = 0; $i < $inputLength - 1 && ($inputLength - $i) * 2 >= $maxLength; $i++) {
            $positionsOdd = $this->expandPalindrome($input, $inputLength, $i, $i);
            if (null !== $positionsOdd) {
                [$currentStart, $currentEnd] = $positionsOdd;
                $currentLength = $currentEnd - $currentStart + 1;
                if ($currentLength > $maxLength) {
                    $startPos = $currentStart;
                    $endPos = $currentEnd;
                    $maxLength = $currentLength;
                }
            }

            $positionsEven = $this->expandPalindrome($input, $inputLength, $i, $i + 1);
            if (null !== $positionsEven) {
                [$currentStart, $currentEnd] = $positionsEven;
                $currentLength = $currentEnd - $currentStart + 1;
                if ($currentLength > $maxLength) {
                    $startPos = $currentStart;
                    $endPos = $currentEnd;
                    $maxLength = $currentLength;
                }
            }
        }

        return substr($input, $startPos, $endPos - $startPos + 1);
    }

    private function expandPalindrome(string $input, int $inputLength, int $start, int $end): ?array
    {
        $foundPositions = null;
        while ($start >= 0 && $end < $inputLength && $input[$start] === $input[$end]) {
            $foundPositions = [$start, $end];
            $start--;
            $end++;
        }

        return $foundPositions;
    }
}
