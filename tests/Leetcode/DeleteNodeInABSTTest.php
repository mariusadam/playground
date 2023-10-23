<?php

namespace App\Tests\Leetcode;

use App\Leetcode\DeleteNodeInABST;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class DeleteNodeInABSTTest extends TestCase
{
    public static function deleteNodeProvider(): array
    {
        return [
            [
                'tree' => [5, 3, 6, 2, 4, null, 7],
                'key' => 0,
                'expected' => [5, 3, 6, 2, 4, null, 7],
            ],
            [
                'tree' => [],
                'key' => 0,
                'expected' => [],
            ],
            [
                'tree' => [5, 3, 6, 2, 4, null, 7],
                'key' => 3,
                'expected' => [5, 4, 6, 2, null, null, 7],
            ],
        ];
    }

    /**
     * @dataProvider deleteNodeProvider
     */
    public function testDeleteNode(array $tree, int $key, array $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new DeleteNodeInABST();
        $result = $solution->deleteNode($root, $key);
        self::assertSame($expected, $result ? $result->levelOrderTraversal() : []);
    }
}