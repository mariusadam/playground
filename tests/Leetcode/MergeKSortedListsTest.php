<?php

namespace App\Tests\Leetcode;

use App\Leetcode\MergeKSortedLists;
use App\Lib\SinglyLinkedListNode;
use PHPUnit\Framework\TestCase;

class MergeKSortedListsTest extends TestCase
{
    public static function mergeKListsProvider(): array
    {
        return [
            [
                'lists' => [[1, 4, 5], [1, 3, 4], [2, 6]],
                'expected' => [1, 1, 2, 3, 4, 4, 5, 6],
            ],
            [
                'lists' => [],
                'expected' => [],
            ],
            [
                'lists' => [[1], [0]],
                'expected' => [0, 1],
            ],
        ];
    }

    /**
     * @dataProvider mergeKListsProvider
     */
    public function testMergeKSortedLists(array $lists, array $expected): void
    {
        $headList = array_map(fn(array $list) => SinglyLinkedListNode::createLinksFromArray($list), $lists);
        $solution = new MergeKSortedLists();
        $solutionHead = $solution->mergeKLists($headList);
        self::assertSame($expected, $solutionHead ? $solutionHead->toArray() : []);
    }

    /**
     * @dataProvider mergeKListsProvider
     */
    public function testMergeKSortedListsUsingMinHeap(array $lists, array $expected): void
    {
        $headList = array_map(fn(array $list) => SinglyLinkedListNode::createLinksFromArray($list), $lists);
        $solution = new MergeKSortedLists();
        $solutionHead = $solution->mergeKListsUsingMinHeap($headList);
        self::assertSame($expected, $solutionHead ? $solutionHead->toArray() : []);
    }

    /**
     * @dataProvider mergeKListsProvider
     */
    public function testMergeKSortedListsUsingSort(array $lists, array $expected): void
    {
        $headList = array_map(fn(array $list) => SinglyLinkedListNode::createLinksFromArray($list), $lists);
        $solution = new MergeKSortedLists();
        $solutionHead = $solution->mergeKListsUsingSort($headList);
        self::assertSame($expected, $solutionHead ? $solutionHead->toArray() : []);
    }
}