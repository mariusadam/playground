<?php

namespace App\Leetcode;
use App\Lib\Tree\TreeNode;

/**
 * @link https://leetcode.com/problems/path-sum-iii
 */
class PathSum3
{
    public function pathSum(?TreeNode $root, int $targetSum): int
    {
        return $this->countPathSum($targetSum, $root, 0, []);
    }

    /**
     * @param array<TreeNode> $path
     */
    private function countPathSum(int $targetSum, ?TreeNode $root, int $sumSoFar, array $prefixSum): int
    {
        if (null === $root) {
            return 0;
        }

        $sumSoFar += $root->val;
        $foundSums = 0;
        if ($sumSoFar === $targetSum) {
            $foundSums++;
        }

        $diff = $sumSoFar - $targetSum;
        $foundSums += $prefixSum[$diff] ?? 0;

        $prefixSum[$sumSoFar] = ($prefixSum[$sumSoFar] ?? 0) + 1;

        $leftCount = $this->countPathSum($targetSum, $root->left, $sumSoFar, $prefixSum);
        $rightCount = $this->countPathSum($targetSum, $root->right, $sumSoFar, $prefixSum);

        return $foundSums + $leftCount + $rightCount;
    }
}
