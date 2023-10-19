<?php

namespace App\Tests\Leetcode;

use App\Leetcode\AddTwoNumbers;
use App\Lib\List\SinglyLinkedListNode as ListNode;
use PHPUnit\Framework\TestCase;

class AddTwoNumbersTest extends TestCase
{
    public function addTwoNumbersProvider(): array
    {
        return [
            [
                'list1' => [2, 4, 3],
                'list2' => [5, 6, 4],
                'expected' => [7, 0, 8],
            ],
            [
                'list1' => [9, 9, 9, 9, 9, 9, 9],
                'list2' => [9, 9, 9, 9],
                'expected' => [8, 9, 9, 9, 0, 0, 0, 1],
            ],
        ];
    }

    /**
     * @dataProvider addTwoNumbersProvider
     */
    public function testAddTwoNumbers(array $list1, array $list2, array $expected): void
    {
        $solution = new AddTwoNumbers();
        $linkedList1 = ListNode::createLinksFromArray($list1);
        $linkedList2 = ListNode::createLinksFromArray($list2);

        $result = $solution->addTwoNumbers($linkedList1, $linkedList2);
        $resultArray = $result->toArray();
        self::assertSame($expected, $resultArray);
    }
}
