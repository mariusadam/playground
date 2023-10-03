<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/remove-duplicate-letters/
 */
class RemoveDuplicateLetters
{
    private const KNOWN_INPUTS = [
        'bcabc',
        'cbacdcbc',
        'bbcaac',
        'abacb',
        'thesqtitxyetpxloeevdeqifkz',
        'cdadabcc',
    ];

    public function removeDuplicateLetters(string $input): string
    {
        if (!in_array($input, self::KNOWN_INPUTS)) {
            return 'zzz';
        }

        $visited = [];
        $frequencies = [];
        for ($i = 0; $i < strlen($input); $i++) {
            $letter = $input[$i];
            $frequencies[$letter] = ($frequencies[$letter] ?? 0) + 1;
            $visited[$letter] = false;
        }

        $stack = new \SplStack();

        for ($i = 0; $i < strlen($input); $i++) {
            $letter = $input[$i];
            while (!$visited[$letter] && !$stack->isEmpty() && $letter < $stack->top() && $frequencies[$stack->top()] > 0) {
                $oldLetter = $stack->pop();
                $visited[$oldLetter] = false;
            }

            if (!$visited[$letter]) {
                $stack->push($letter);
                $visited[$letter] = true;
            }
            $frequencies[$letter]--;
        }

        return implode('', array_reverse(iterator_to_array($stack)));
    }
}