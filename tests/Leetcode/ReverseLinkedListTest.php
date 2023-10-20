<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ReverseLinkedList;
use App\Lib\List\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class ReverseLinkedListTest extends TestCase
{
    public static function reverseListProvider(): array
    {
        return [
            [
                'list' => [1, 2, 3, 4, 5],
                'expected' => [5, 4, 3, 2, 1],
            ],
            [
                'list' => [2, 1],
                'expected' => [1, 2],
            ],
            [
                'list' => [1],
                'expected' => [1],
            ],
            [
                'list' => [],
                'expected' => [],
            ],
        ];
    }

    /**
     * @dataProvider reverseListProvider
     */
    public function testReverseListIteratively(array $list, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new ReverseLinkedList();
        $resultHead = $solution->reverseListIteratively($listHead);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }

    /**
     * @dataProvider reverseListProvider
     */
    public function testReverseListRecursively(array $list, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new ReverseLinkedList();
        $resultHead = $solution->reverseListRecursively($listHead);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }
}