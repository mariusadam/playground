<?php

namespace App\Tests\Leetcode;
use App\Leetcode\ReverseNodesInKGroup;
use App\Lib\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class ReverseNodesInKGroupTest extends TestCase
{
    public static function reverseKGroupProvider(): array
    {
        return [
            [
                'list' => [1, 2, 3, 4],
                'k' => 2,
                'expected' => [2, 1, 4, 3],
            ],
            [
                'list' => [1, 2, 3, 4, 5],
                'k' => 2,
                'expected' => [2, 1, 4, 3, 5],
            ],
            [
                'list' => [1, 2, 3, 4, 5],
                'k' => 3,
                'expected' => [3, 2, 1, 4, 5],
            ],
        ];
    }

    /**
     * @dataProvider reverseKGroupProvider
     */
    public function testReverseKGroup(array $list, int $k, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new ReverseNodesInKGroup();
        $solutionHead = $solution->reverseKGroup($listHead, $k);
        self::assertSame($expected, $solutionHead ? $solutionHead->toArray() : []);
    }
}