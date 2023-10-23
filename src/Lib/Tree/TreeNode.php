<?php

namespace App\Lib\Tree;

class TreeNode
{
    public mixed $val;
    public ?TreeNode $left;
    public ?TreeNode $right;

    public function __construct($val, ?TreeNode $left = null, ?TreeNode $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }

    public static function createFromArray(array $arr): ?self
    {
        return self::createUsingQueue($arr);
    }

    /**
     * Work only with an array representing a complete binary tree where
     * all left-most sub-tree are completed
     */
    public static function createFromCompleteTreeArray(array $arr, int $rootPosition = 0): ?self
    {
        $root = null;
        if ($rootPosition < count($arr) && $arr[$rootPosition] !== null) {
            $root = new TreeNode(
                $arr[$rootPosition],
                self::createFromCompleteTreeArray($arr, 2 * $rootPosition + 1),
                self::createFromCompleteTreeArray($arr, 2 * $rootPosition + 2),
            );
        }

        return $root;
    }

    private static function createUsingQueue(array $arr): ?self
    {
        if ([] === $arr) {
            return null;
        }

        $root = new TreeNode($arr[0]);
        $queue = new \SplQueue();
        $queue->enqueue($root);
        $i = 1;
        while ($i < count($arr)) {
            $current = $queue->dequeue();
            $leftNodeValue = $arr[$i];
            $i++;
            if (null !== $leftNodeValue) {
                $leftNode = new TreeNode($leftNodeValue);
                $current->left = $leftNode;
                $queue->enqueue($leftNode);
            }
            if ($i < count($arr)) {
                $rightNodeValue = $arr[$i];
                $i++;
                if ($rightNodeValue !== null) {
                    $rightNode = new TreeNode($rightNodeValue);
                    $current->right = $rightNode;
                    $queue->enqueue($rightNode);
                }
            }
        }

        return $root;
    }

    public function inOrderTraversal(): array
    {
        $path = [];
        $this->buildInOrderTraversal($this, $path);

        return $path;
    }

    private function buildInOrderTraversal(?TreeNode $current, array &$path): void
    {
        if (null === $current) {
            return;
        }

        $this->buildInOrderTraversal($current->left, $path);
        $path[] = $current->val;
        $this->buildInOrderTraversal($current->right, $path);
    }

    public function levelOrderTraversal(): array
    {
        $levelOrder = [];
        $queue = new \SplQueue();
        $queue->enqueue($this);
        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            if (null === $current) {
                // add null to the result in order to be able to represent un-balanced trees
                $levelOrder[] = null;
                continue;
            }
            $levelOrder[] = $current->val;


            if ($current->left !== null || $current->right !== null) {
                // enqueue both children for non-leaf nodes, even if one of the is null
                $queue->enqueue($current->left);
                $queue->enqueue($current->right);
            }
        }

        return $levelOrder;
    }
}