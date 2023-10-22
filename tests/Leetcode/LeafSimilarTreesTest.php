<?php

namespace App\Tests\Leetcode;

use App\Leetcode\LeafSimilarTrees;
use App\Lib\Tree\TreeNode;
use PHPUnit\Framework\TestCase;

class LeafSimilarTreesTest extends TestCase
{
    public static function leafSimilarProvider(): array
    {
        return [
            [
                'tree1' => [3, 5, 1, 6, 2, 9, 8, null, null, 7, 4],
                'tree2' => [3, 5, 1, 6, 7, 4, 2, null, null, null, null, null, null, 9, 8],
                'expected' => true,
            ],
            [
                'tree1' => [1, 2, 3],
                'tree2' => [1, 3, 2],
                'expected' => false,
            ],
        ];
    }

    /**
     * @dataProvider leafSimilarProvider
     */
    public function testLeafSimilar(array $tree1, array $tree2, bool $expected): void
    {
        $root1 = TreeNode::createFromArray($tree1);
        $root2 = TreeNode::createFromArray($tree2);
        $solution = new LeafSimilarTrees();
        self::assertSame($expected, $solution->leafSimilar($root1, $root2));
    }
}