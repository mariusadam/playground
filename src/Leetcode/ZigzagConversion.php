<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/zigzag-conversion/
 */
class ZigzagConversion
{
    public function convert(string $input, int $numRows): string
    {
        $workingMatrix = [];
        $i = 0;
        $j = 0;
        $currentIndex = 0;
        $inputLength = strlen($input);
        $isGoingDown = true;
        $isGoingUpRight = false;
        while ($currentIndex < $inputLength) {
            $workingMatrix[$i][$j] = $input[$currentIndex];
            $currentIndex++;
            if ($isGoingDown) {
                $i++;
            }
            if ($isGoingUpRight) {
                $i--;
                $j++;
            }
            if ($i === $numRows - 1) {
                $isGoingDown = false;
                $isGoingUpRight = true;
            }
            if ($i === 0) {
                $isGoingDown = true;
                $isGoingUpRight = false;
            }
        }

        $output = '';
        foreach ($workingMatrix as $line) {
            $output .= implode('', $line);
        }

        return $output;
    }
}