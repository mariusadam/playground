<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MergeTwoSortedLists;
use PHPUnit\Framework\TestCase;
use App\Lib\List\SinglyLinkedListNode;

class MergeTwoSortedListsTest extends TestCase
{
    public static function mergeTwoListsProvider(): array
    {
        return [
            [
                'list1' => [],
                'list2' => [],
                'expected' => [],
            ],
            [
                'list1' => [1, 2, 4],
                'list2' => [1, 3, 4],
                'expected' => [1, 1, 2, 3, 4, 4],
            ],
            [
                'list1' => [],
                'list2' => [3],
                'expected' => [3],
            ],
        ];
    }

    /**
     * @dataProvider mergeTwoListsProvider
     */
    public function testMergeTwoLists(array $list1, array $list2, array $expected): void
    {
        $head1 = SinglyLinkedListNode::createLinksFromArray($list1);
        $head2 = SinglyLinkedListNode::createLinksFromArray($list2);

        $solution = new MergeTwoSortedLists();
        $resultHead = $solution->mergeTwoLists($head1, $head2);
        self::assertSame($expected, $resultHead ? $resultHead->toArray() : []);
    }
}