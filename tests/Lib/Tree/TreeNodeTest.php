<?php

namespace App\Tests\Lib\Tree;

use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class TreeNodeTest extends TestCase
{
    public function createFromArrayProvider(): array
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
}