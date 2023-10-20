<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MaximumTwinSumOfALinkedList;
use App\Lib\List\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class MaximumTwinSumOfALinkedListTest extends TestCase
{
    public static function pairSumProvider(): array
    {
        return [
            [
                'list' => [5, 4, 2, 1],
                'expected' => 6,
            ],
            [
                'list' => [4, 2, 2, 3],
                'expected' => 7,
            ],
            [
                'list' => [1, 1000],
                'expected' => 1001,
            ],
        ];
    }

    /**
     * @dataProvider pairSumProvider
     */
    public function testPairSum(array $list, int $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new MaximumTwinSumOfALinkedList();
        self::assertSame($expected, $solution->pairSum($listHead));
    }

    /**
     * @dataProvider pairSumProvider
     */
    public function testPairSumWithReversedList(array $list, int $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new MaximumTwinSumOfALinkedList();
        self::assertSame($expected, $solution->pairSumWithReversedList($listHead));
    }
}