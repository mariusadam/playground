<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/maximum-depth-of-binary-tree
 */
class MaximumDepthOfBinaryTree
{
    public function maxDepth(?TreeNode $root): int
    {
        return $this->getTreeHeight($root);
    }

    private function getTreeHeight(?TreeNode $root): int
    {
        if (null === $root) {
            return 0;
        }

        $leftHeight = $this->getTreeHeight($root->left);
        $rightHeight = $this->getTreeHeight($root->right);

        return 1 + max($leftHeight, $rightHeight);
    }
}