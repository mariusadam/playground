<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaximumDepthOfBinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class MaximumDepthOfBinaryTreeTest extends TestCase
{
    public static function maxDepthProvider(): array
    {
        return [
            [
                'tree' => [3, 9, 20, null, null, 15, 7],
                'expectedDepth' => 3,
            ],
            [
                'tree' => [1, null, 2],
                'expectedDepth' => 2,
            ],
        ];
    }

    /**
     * @dataProvider maxDepthProvider
     */
    public function testMaxDepth(array $tree, int $expectedDepth): void
    {
        $treeRoot = TreeNode::createFromArray($tree);
        $solution = new MaximumDepthOfBinaryTree();
        self::assertSame($expectedDepth, $solution->maxDepth($treeRoot));
    }
}