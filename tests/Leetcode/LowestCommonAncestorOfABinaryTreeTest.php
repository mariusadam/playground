<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LowestCommonAncestorOfABinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class LowestCommonAncestorOfABinaryTreeTest extends TestCase
{
    public static function lowestCommonAncestorProvider(): array
    {
        return [
            [
                'tree' => [3, 5, 1, 6, 2, 0, 8, null, null, 7, 4],
                'p' => 5,
                'q' => 1,
                'expected' => 3,
            ],
            [
                'tree' => [3, 5, 1, 6, 2, 0, 8, null, null, 7, 4],
                'p' => 5,
                'q' => 4,
                'expected' => 5,
            ],
            [
                'tree' => [1, 2],
                'p' => 1,
                'q' => 2,
                'expected' => 1,
            ],
        ];
    }

    /**
     * @dataProvider lowestCommonAncestorProvider
     */
    public function testLowestCommonAncestor(array $tree, int $p, int $q, ?int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new LowestCommonAncestorOfABinaryTree();
        $commonAncestorNode = $solution->lowestCommonAncestor($root, new TreeNode($p), new TreeNode($q));
        self::assertSame($expected, $commonAncestorNode?->val);
    }

    /**
     * @dataProvider lowestCommonAncestorProvider
     */
    public function testLowestCommonAncestorSimpler(array $tree, int $p, int $q, ?int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new LowestCommonAncestorOfABinaryTree();
        $commonAncestorNode = $solution->lowestCommonAncestorSimpler($root, new TreeNode($p), new TreeNode($q));
        self::assertSame($expected, $commonAncestorNode?->val);
    }
}