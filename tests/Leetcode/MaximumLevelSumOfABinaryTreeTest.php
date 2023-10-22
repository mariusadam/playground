<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaximumLevelSumOfABinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class MaximumLevelSumOfABinaryTreeTest extends TestCase
{
    public static function maxLevelSumProvider(): array
    {
        return [
            [
                'tree' => [1, 7, 0, 7, -8, null, null],
                'expected' => 2,
            ],
            [
                'tree' => [989, null, 10250, 98693, -89388, null, null, null, -32127],
                'expected' => 2,
            ],
        ];
    }

    /**
     * @dataProvider maxLevelSumProvider
     */
    public function testMaxLevelSum(array $tree, int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new MaximumLevelSumOfABinaryTree();
        self::assertSame($expected, $solution->maxLevelSum($root));
    }
}