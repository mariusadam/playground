<?php

namespace App\Leetcode;

use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/delete-node-in-a-bst
 */
class DeleteNodeInABST
{
    public function deleteNode(?TreeNode $root, int $key): ?TreeNode
    {
        if ($root === null) {
            return null;
        }

        if ($root->val > $key) {
            $root->left = $this->deleteNode($root->left, $key);

            return $root;
        }
        if ($root->val < $key) {
            $root->right = $this->deleteNode($root->right, $key);

            return $root;
        }

        // root is the node to be deleted

        // when one of the children is empty, return the other child 
        if ($root->left === null) {
            return $root->right;
        }
        if ($root->right === null) {
            return $root->left;
        }

        // both children exist, we have to find successor of the root
        $successorParent = $root;
        $successor = $root->right;
        while ($successor->left !== null) {
            $successorParent = $successor;
            $successor = $successor->left;
        }

        if ($successorParent === $root) {
            $successorParent->right = $successor->right;
        } else {
            $successorParent->left = $successor->right;
        }
        $root->val = $successor->val;

        return $root;
    }
}