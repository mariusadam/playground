<?php

namespace App\Tests\Leetcode;

use App\Leetcode\AddTwoNumbers;
use App\Leetcode\AddTwoNumbersListNode as ListNode;
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
        $linkedList1 = $this->arrayToLinkedList($list1);
        $linkedList2 = $this->arrayToLinkedList($list2);

        $result = $solution->addTwoNumbers($linkedList1, $linkedList2);
        $resultArray = $this->linkedListToArray($result);
        self::assertSame($expected, $resultArray);
    }

    private function arrayToLinkedList(array $list): ListNode
    {
        $head = new ListNode($list[0], null);
        $previous = $head;
        for ($i = 1; $i < count($list); $i++) {
            $current = new ListNode($list[$i], null);
            $previous->next = $current;
            $previous = $current;
        }

        return $head;
    }

    private function linkedListToArray(ListNode $head): array
    {
        $result = [];
        $current = $head;
        while ($current !== null) {
            $result[] = $current->val;
            $current = $current->next;
        }

        return $result;
    }
}
