<?php

namespace App\Tests\Leetcode;

use App\Leetcode\SearchInABinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class SearchInABinaryTreeTest extends TestCase
{
    public static function searchBSTProvider(): array
    {
        return [
            [
                'tree' => [4, 2, 7, 1, 3],
                'val' => 2,
                'expected' => [2, 1, 3],
            ],
            [
                'tree' => [4, 2, 7, 1, 3],
                'val' => 5,
                'expected' => [],
            ],
        ];
    }

    /**
     * @dataProvider searchBSTProvider
     */
    public function testSearchBST(array $tree, int $val, array $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new SearchInABinaryTree();
        $result = $solution->searchBST($root, $val);
        self::assertSame($expected, $result ? $result->levelOrderTraversal() : []);
    }
}