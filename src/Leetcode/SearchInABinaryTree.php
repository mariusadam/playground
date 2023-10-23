<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/search-in-a-binary-search-tree
 */
class SearchInABinaryTree
{
    public function searchBST(?TreeNode $root, int $val): ?TreeNode
    {
        if (null === $root) {
            return null;
        }

        if ($root->val === $val) {
            return $root;
        }

        return $root->val > $val ? $this->searchBST($root->left, $val) : $this->searchBST($root->right, $val);
    }
}