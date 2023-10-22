<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/lowest-common-ancestor-of-a-binary-tree/
 */
class LowestCommonAncestorOfABinaryTree
{
    public function lowestCommonAncestor(TreeNode $root, TreeNode $p, TreeNode $q): ?TreeNode
    {
        $qPath = [];
        $this->buildPathToNode($root, $p, $qPath);

        $pPath = [];
        $this->buildPathToNode($root, $q, $pPath);

        $maxLength = min(count($qPath), count($pPath));
        $i = 0;
        while ($i < $maxLength && $qPath[$i]->val === $pPath[$i]->val) {
            $i++;
        }

        // LCA is the last common node in the paths of the two nodes
        return $i > 0 ? $qPath[$i - 1] : null;
    }

    private function buildPathToNode(?TreeNode $root, TreeNode $target, array &$path): bool
    {
        if (null === $root) {
            return false;
        }

        $path[] = $root;
        if (
            $root->val === $target->val
            || $this->buildPathToNode($root->left, $target, $path)
            || $this->buildPathToNode($root->right, $target, $path)
        ) {
            return true;
        }

        // current node is not part of the path
        array_pop($path);

        return false;
    }

    public function lowestCommonAncestorSimpler(?TreeNode $root, TreeNode $p, TreeNode $q): ?TreeNode
    {
        if (null === $root || $root->val === $p->val || $root->val === $q->val) {
            return $root;
        }

        $leftLCA = $this->lowestCommonAncestorSimpler($root->left, $p, $q);
        $rightLCA = $this->lowestCommonAncestorSimpler($root->right, $p, $q);

        // nodes were found in both sub-trees, LCA is the current root
        if (null !== $leftLCA && null !== $rightLCA) {
            return $root;
        }

        // LCA is the non-null node
        return $leftLCA ?? $rightLCA;
    }
}