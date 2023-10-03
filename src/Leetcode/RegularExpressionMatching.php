<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/regular-expression-matching/
 */
class RegularExpressionMatching
{
    public function isMatch(string $subject, string $pattern): bool
    {
        // [i][j] = 1 if substring(0, i) matches substring(0, j)
        $matchMatrix = [];

        // only empty subject "" matches pattern ""
        $matchMatrix[0][0] = true;
        for ($i = 1; $i <= strlen($subject); $i++) {
            $matchMatrix[$i][0] = false;
        }

        // one character pattern does not match empty string
        $matchMatrix[0][1] = false;
        for ($j = 2; $j <= strlen($pattern); $j++) {
            $matchMatrix[0][$j] = $matchMatrix[0][$j - 2] && $pattern[$j - 1] === '*';
        }

        for ($i = 1; $i <= strlen($subject); $i++) {
            for ($j = 1; $j <= strlen($pattern); $j++) {
                // current character in the pattern is either any '.' or matches current subject character
                if ($pattern[$j - 1] === '.' || $pattern[$j - 1] === $subject[$i - 1]) {
                    $matchMatrix[$i][$j] = $matchMatrix[$i - 1][$j - 1];
                    continue;
                }

                // current character is wildcard, is a match if either the previous character is the same as the one in the pattern, or if it's not present at all
                if ($pattern[$j - 1] === '*') {
                    $matchesZeroTimes = $matchMatrix[$i][$j - 2];
                    $previousPatternCharMatches = $pattern[$j - 2] === '.' || $pattern[$j - 2] === $subject[$i - 1];
                    $matchMatrix[$i][$j] = $matchesZeroTimes || ($previousPatternCharMatches && $matchMatrix[$i - 1][$j]);
                    continue;
                }

                $matchMatrix[$i][$j] = false;
            }
        }

//        $this->displayMatrix($matchMatrix, $subject, $pattern);

        return $matchMatrix[strlen($subject)][strlen($pattern)];
    }

    private function displayMatrix(array $matchMatrix, string $subject, string $pattern): void
    {
        echo PHP_EOL;
        echo '|   ';
        echo '|pat';
        for ($i = 0; $i <= strlen($pattern); $i++) {
            echo sprintf('|%s', str_pad($i, 3));
        }
        echo '|'.PHP_EOL;
        echo '|sub';
        echo '|   ';
        for ($i = 0; $i < strlen($pattern); $i++) {
            echo sprintf('|%s', str_pad($pattern[$i], 3));
        }
        echo '|   ';
        echo '|'.PHP_EOL;
        for ($i = 0; $i <= strlen($subject); $i++) {
            echo sprintf('|%s', str_pad($i, 3));
            echo sprintf('|%s', str_pad($subject[$i] ?? '', 3));
            for ($j = 0; $j <= strlen($pattern); $j++) {
                echo sprintf('|%s', str_pad($matchMatrix[$i][$j] ? '1' : '0', 3));
            }
            echo '|'.PHP_EOL;
        }
    }

    /**
     * Solution that tries to simply advance the offset in the subject and pattern does not work in all cases
     */
    public function isMatchInitialSolution(string $subject, string $pattern): bool
    {
        $subjectLength = strlen($subject);
        $patternLength = strlen($pattern);
        $patternOffset = 0;
        $subjectOffset = 0;
        while ( $subjectOffset < $subjectLength) {
            if ($patternOffset >= $patternLength) {
                // reached end of pattern
                return false;
            }

            $subjectCharacter = $subject[$subjectOffset];

            if ('*' === $pattern[$patternOffset]) {
                if ($subjectCharacter === $pattern[$patternOffset - 1] || '.' === $pattern[$patternOffset - 1]) {
                    // matches wildcard, continue with the next character
                    $subjectOffset++;
                    continue;
                }

                // not a wildcard match, advance pattern offset, maybe that will match
                $patternOffset++;
            }

            if ('.' !== $pattern[$patternOffset] && $pattern[$patternOffset] !== $subjectCharacter) {
                // check if should zero or more of the current character, and then advance pattern, maybe it'll match
                if ($patternOffset < $patternLength - 1 && $pattern[$patternOffset + 1] === '*') {
                    // advance only pattern, remain at current subject character
                    $patternOffset += 2;
                    continue;
                }

                // not a match
                return false;
            }

            $patternOffset++;
            $subjectOffset++;
        }

        return $subjectOffset === $subjectLength && $patternOffset >= $patternLength - 1;
    }
}
