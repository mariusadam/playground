<?php

namespace App\Leetcode;
use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/count-good-nodes-in-binary-tree
 */
class CountGoodNodesInABinaryTree
{
    public function goodNodes(TreeNode $root): int
    {
        return $this->countGoodNodes($root, $root->val);
    }

    private function countGoodNodes(?TreeNode $root, $maxValue): int
    {
        if (null === $root) {
            return 0;
        }

        $current = 0;
        $newMax = $maxValue;
        if ($root->val >= $maxValue) {
            $newMax = $root->val;
            $current = 1;
        }

        return $current + $this->countGoodNodes($root->left, $newMax) + $this->countGoodNodes($root->right, $newMax);
    }
}
