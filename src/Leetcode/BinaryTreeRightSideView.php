<?php

namespace App\Leetcode;
use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/binary-tree-right-side-view
 */
class BinaryTreeRightSideView
{
    /**
     * @return array<int>
     */
    public function rightSideView(?TreeNode $root): array
    {
        if (null === $root) {
            return [];
        }
        
        $view = [];
        $queue = new \SplQueue();
        $queue->enqueue($root);
        while (!$queue->isEmpty()) {
            $currentLevelNodeCount = $queue->count();
            for ($i = 1; $i <= $currentLevelNodeCount; $i++) {
                $node = $queue->dequeue();
                if ($i === $currentLevelNodeCount) {
                    $view[] = $node->val;
                }
                if (null !== $node->left) {
                    $queue->enqueue($node->left);
                }
                if (null !== $node->right) {
                    $queue->enqueue($node->right);
                }
            }
        }

        return $view;
    }
}