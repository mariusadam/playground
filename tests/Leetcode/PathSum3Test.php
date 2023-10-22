<?php

namespace App\Tests\Leetcode;

use App\Leetcode\PathSum3;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class PathSum3Test extends TestCase
{
    public static function pathSumProvider(): array
    {
        return [
            [
                'tree' => [10, 5, -3, 3, 2, null, 11, 3, -2, null, 1],
                'targetSum' => 8,
                'expected' => 3,
            ],
            [
                'tree' => [5, 4, 8, 11, null, 13, 4, 7, 2, null, null, 5, 1],
                'targetSum' => 22,
                'expected' => 3,
            ],
            [
                'tree' => [],
                'targetSum' => 1,
                'expected' => 0,
            ],
        ];
    }

    /**
     * @dataProvider pathSumProvider
     */
    public function testPathSum(array $tree, int $targetSum, int $expected): void
    {
        $root = TreeNode::createFromArray($tree);
        $solution = new PathSum3();
        self::assertSame($expected, $solution->pathSum($root, $targetSum));
    }
}