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
}