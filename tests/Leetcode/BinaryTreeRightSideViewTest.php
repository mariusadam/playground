<?php

namespace App\Tests\Leetcode;

use App\Leetcode\BinaryTreeRightSideView;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class BinaryTreeRightSideViewTest extends TestCase
{
    public function rightSideViewProvider(): array
    {
        return [
            [
                'tree' => [1, 2, 3, null, 5, null, 4],
                'expected' => [1, 3, 4],
            ],
            [
                'tree' => [1, null, 3],
                'expected' => [1, 3],
            ],
            [
                'tree' => [],
                'expected' => [],
            ],
        ];
    }

    /**
     * @dataProvider rightSideViewProvider
     */
    public function testRightSideView(array $tree, array $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new BinaryTreeRightSideView();
        self::assertSame($expected, $solution->rightSideView($root));
    }
}