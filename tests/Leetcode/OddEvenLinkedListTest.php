<?php

namespace App\Tests\Leetcode;

use App\Leetcode\OddEvenLinkedList;
use App\Lib\List\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class OddEvenLinkedListTest extends TestCase
{
    public static function oddEvenListProvider(): array
    {
        return [
            [
                'list' => [1, 2, 3, 4, 5],
                'expected' => [1, 3, 5, 2, 4],
            ],
            [
                'list' => [2, 1, 3, 5, 6, 4, 7],
                'expected' => [2, 3, 6, 7, 1, 5, 4],
            ],
        ];
    }

    /**
     * @dataProvider oddEvenListProvider
     */
    public function testOddEvenLinkedList(array $list, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new OddEvenLinkedList();
        $resultHead = $solution->oddEvenList($listHead);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }
}