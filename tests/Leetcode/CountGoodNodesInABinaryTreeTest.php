<?php

namespace App\Tests\Leetcode;

use App\Leetcode\CountGoodNodesInABinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class CountGoodNodesInABinaryTreeTest extends TestCase
{
    public static function goodNodesProvider(): array
    {
        return [
            [
                'tree' => [3, 1, 4, 3, null, 1, 5],
                'expected' => 4,
            ],
            [
                'tree' => [3, 3, null, 4, 2],
                'expected' => 3,
            ],
            [
                'tree' => [3],
                'expected' => 1,
            ],
        ];
    }

    /**
     * @dataProvider goodNodesProvider
     */
    public function testGoodNodes(array $tree, int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new CountGoodNodesInABinaryTree();
        self::assertSame($expected, $solution->goodNodes($root));
    }
}