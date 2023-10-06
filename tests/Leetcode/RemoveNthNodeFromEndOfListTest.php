<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RemoveNthNodeFromEndOfList;
use App\Lib\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class RemoveNthNodeFromEndOfListTest extends TestCase
{
    public static function removeNthFromEndProvider(): array
    {
        return [
            [
                'list' => [1, 2, 3, 4, 5],
                'n' => 2,
                'expected' => [1, 2, 3, 5],
            ],
            [
                'list' => [1],
                'n' => 1,
                'expected' => [],
            ],
            [
                'list' => [1, 2],
                'n' => 1,
                'expected' => [1],
            ],
            [
                'list' => [1, 2, 3],
                'n' => 3,
                'expected' => [2, 3],
            ],
            [
                'list' => [1, 2],
                'n' => 3,
                'expected' => [1, 2],
            ],
        ];
    }

    /**
     * @dataProvider removeNthFromEndProvider
     */
    public function testRemoveNthFromEndIterative(array $list, int $n, array $expected): void
    {
        $head = SinglyLinkedListNode::createLinksFromArray($list);

        $solution = new RemoveNthNodeFromEndOfList();
        $resultHead = $solution->removeNthFromEndIterative($head, $n);
        self::assertSame($expected, $resultHead === null ? [] : $resultHead->toArray());
    }

    /**
     * @dataProvider removeNthFromEndProvider
     */
    public function testRemoveNthFromEndRecursive(array $list, int $n, array $expected): void
    {
        $head = SinglyLinkedListNode::createLinksFromArray($list);

        $solution = new RemoveNthNodeFromEndOfList();
        $resultHead = $solution->removeNthFromEndRecursive($head, $n);
        self::assertSame($expected, $resultHead === null ? [] : $resultHead->toArray());
    }
}
