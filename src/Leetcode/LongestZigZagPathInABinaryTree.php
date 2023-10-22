<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/longest-zigzag-path-in-a-binary-tree
 */
class LongestZigZagPathInABinaryTree
{
    public function longestZigZag(TreeNode $root): int
    {
        return max(
            $this->walkZigZag($root, false, 0),
            $this->walkZigZag($root, true, 0)
        );
    }

    private function walkZigZag(?TreeNode $root, bool $goLeft, int $length): int
    {
        if (null === $root) {
            return $length - 1;
        }

        if ($goLeft) {
            return max(
                $this->walkZigZag($root->left, false, $length + 1),
                $this->walkZigZag($root->right, true, 1)
            );
        } else {
            return max(
                $this->walkZigZag($root->left, false, 1),
                $this->walkZigZag($root->right, true, $length + 1)
            );
        }
    }
}