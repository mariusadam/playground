<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LongestZigZagPathInABinaryTree;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class LongestZigZagPathInABinaryTreeTest extends TestCase
{
    public static function longestZigZagProvider(): array
    {
        return [
            [
                'tree' => [1, null, 1, 1, 1, null, null, 1, 1, null, 1, null, null, null, 1],
                'expected' => 3,
            ],
            [
                'tree' => [1, 1, 1, null, 1, null, null, 1, 1, null, 1],
                'expected' => 4,
            ],
            [
                'tree' => [1],
                'expected' => 0,
            ],
        ];
    }

    /**
     * @dataProvider longestZigZagProvider
     */
    public function testLongestZigZag(array $tree, int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new LongestZigZagPathInABinaryTree();
        self::assertSame($expected, $solution->longestZigZag($root));
    }
}