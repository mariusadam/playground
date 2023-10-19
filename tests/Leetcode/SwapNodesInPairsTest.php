<?php

namespace App\Tests\Leetcode;

use App\Leetcode\SwapNodesInPairs;
use App\Lib\List\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class SwapNodesInPairsTest extends TestCase
{
    public function swapPairsProvider(): array
    {
        return [
            [
                'list' => [1, 2, 3, 4],
                'expected' => [2, 1, 4, 3],
            ],
            [
                'list' => [1],
                'expected' => [1],
            ],
            [
                'list' => [],
                'expected' => [],
            ]
        ];
    }

    /**
     * @dataProvider swapPairsProvider
     */
    public function testSwapPairs(array $list, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new SwapNodesInPairs();
        $resultHead = $solution->swapPairs($listHead);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }
}