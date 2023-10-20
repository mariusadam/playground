<?php

namespace App\Tests\Leetcode;

use App\Leetcode\DeleteMiddleNodeOfALinkedList;
use App\Lib\List\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class DeleteMiddleNodeOfALinkedListTest extends TestCase
{
    public static function deleteMiddleProvider(): array
    {
        return [
            [
                'list' => [1, 3, 4, 7, 1, 2, 6],
                'expected' => [1, 3, 4, 1, 2, 6],
            ],
            [
                'list' => [1, 2, 3, 4],
                'expected' => [1, 2, 4],
            ],
            [
                'list' => [2, 1],
                'expected' => [2],
            ],
            [
                'list' => [10],
                'expected' => [],
            ],
        ];
    }

    /**
     * @dataProvider deleteMiddleProvider
     */
    public function testDeleteMiddle(array $list, array $expected): void
    {
        $listHead = SinglyLinkedListNode::createLinksFromArray($list);
        $solution = new DeleteMiddleNodeOfALinkedList();
        $resultHead = $solution->deleteMiddle($listHead);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }
}