<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/leaf-similar-trees
 */
class LeafSimilarTrees
{
    public function leafSimilar(TreeNode $root1, TreeNode $root2): bool
    {
        $leafValuesTree1 = $this->getLeafValues($root1);
        $leafValuesTree2 = $this->getLeafValues($root2);

        $count1 = count($leafValuesTree1);
        $count2 = count($leafValuesTree2);
        if ($count1 !== $count2) {
            return false;
        }

        for ($i = 0; $i < $count1; $i++) {
            if ($leafValuesTree1[$i] !== $leafValuesTree2[$i]) {
                return false;
            }
        }

        return true;
    }

    private function getLeafValues(?TreeNode $root): array
    {
        if (null === $root) {
            return [];
        }
        if (null === $root->left && null === $root->right) {
            return [$root->val];
        }

        return array_merge(
            $this->getLeafValues($root->left),
            $this->getLeafValues($root->right)
        );
    }
}