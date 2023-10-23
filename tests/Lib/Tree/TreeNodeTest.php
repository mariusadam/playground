<?php

namespace App\Tests\Lib\Tree;

use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class TreeNodeTest extends TestCase
{
    public static function createFromArrayProvider(): array
    {
        return [
            [
                'arr' => [],
                'expectedTree' => null,
            ],
            [
                'arr' => [55],
                'expectedTree' => new TreeNode(55),
            ],
            [
                'arr' => [3, 9, 20, null, null, 15, 7],
                'expectedTree' => new TreeNode(
                    3,
                    new TreeNode(9),
                    new TreeNode(
                        20,
                        new TreeNode(15),
                        new TreeNode(7),
                    )
                ),
            ],
            [
                'arr' => [5, 3, 6, 2, 4, null, 7],
                'expectedTree' => new TreeNode(
                    5,
                    new TreeNode(
                        3,
                        new TreeNode(2),
                        new TreeNode(4)
                    ),
                    new TreeNode(
                        6,
                        null,
                        new TreeNode(7)
                    ),
                ),
            ],
            [
                'arr' => [5, 4, 6, 2, null, null, 7],
                'expectedTree' => new TreeNode(
                    5,
                    new TreeNode(
                        4,
                        new TreeNode(2),
                        null
                    ),
                    new TreeNode(
                        6,
                        null,
                        new TreeNode(7)
                    ),
                ),
            ],
        ];
    }

    /**
     * @dataProvider createFromArrayProvider
     */
    public function testCreateFromArray(array $arr, ?TreeNode $expectedTree): void
    {
        $tree = TreeNode::createFromArray($arr);
        self::assertEquals($expectedTree, $tree);
    }

    public static function inOrderTraversalProvider(): array
    {
        return [
            [
                'root' => new TreeNode(
                    2,
                    new TreeNode(1),
                    new TreeNode(3)
                ),
                'expected' => [1, 2, 3],
            ],
        ];
    }

    /**
     * @dataProvider inOrderTraversalProvider
     */
    public function testInOrderTraversal(TreeNode $root, array $expected): void
    {
        self::assertSame($expected, $root->inOrderTraversal());
    }

    public static function levelOrderTraversalProvider(): array
    {
        return [
            [
                'root' => new TreeNode(
                    2,
                    new TreeNode(1),
                    new TreeNode(3)
                ),
                'expected' => [2, 1, 3],
            ],
            [
                'root' => new TreeNode(
                    1,
                    new TreeNode(
                        2,
                        new TreeNode(4),
                        new TreeNode(5),
                    ),
                    new TreeNode(3)
                ),
                'expected' => [1, 2, 3, 4, 5],
            ],
            [
                'root' => TreeNode::createFromArray([5, 3, 6, 2, 4, null, 7]),
                'expected' => [5, 3, 6, 2, 4, null, 7],
            ],
            [
                'root' => TreeNode::createFromArray([5, 4, 6, 2, null, null, 7]),
                'expected' => [5, 4, 6, 2, null, null, 7],
            ],
        ];
    }

    /**
     * @dataProvider levelOrderTraversalProvider
     */
    public function testLevelOrderTraversal(TreeNode $root, array $expected): void
    {
        self::assertSame($expected, $root->levelOrderTraversal());
    }
}