<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/maximum-level-sum-of-a-binary-tree
 */
class MaximumLevelSumOfABinaryTree
{
    public function maxLevelSum(TreeNode $root): int
    {
        $maxSum = $root->val;
        $minLevel = 1;
        $currentLevel = 1;
        $queue = new \SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $levelSize = $queue->count();
            $currentSum = 0;
            for ($i = 1; $i <= $levelSize; $i++) {
                $node = $queue->dequeue();
                $currentSum += $node->val;
                if ($node->left) {
                    $queue->enqueue($node->left);
                }
                if ($node->right) {
                    $queue->enqueue($node->right);
                }
            }
            if ($currentSum > $maxSum) {
                $maxSum = $currentSum;
                $minLevel = $currentLevel;
            }
            $currentLevel++;
        }

        return $minLevel;
    }
}