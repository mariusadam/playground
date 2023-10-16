<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/string-compression
 */
class StringCompression
{
    /**
     * @param array<string> $chars
     */
    public function compress(array &$chars): int
    {
        $compressedSize = 0;
        $i = 0;
        while ($i < count($chars)) {
            $currentChar = $chars[$i];
            $currentSize = 0;
            while ($i < count($chars) && $currentChar === $chars[$i]) {
                $currentSize++;
                $i++;
            }
            $chars[$compressedSize] = $currentChar;
            $compressedSize++;
            if ($currentSize === 1) {
                continue;
            }
            $sizeStr = (string) $currentSize;
            for ($j = 0; $j < strlen($sizeStr); $j++) {
                $chars[$compressedSize] = $sizeStr[$j];
                $compressedSize++;
            }
        }

        return $compressedSize;
    }
}