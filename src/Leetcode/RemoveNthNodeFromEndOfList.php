<?php

namespace App\Leetcode;

use App\Lib\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/remove-nth-node-from-end-of-list/
 */
class RemoveNthNodeFromEndOfList
{
    public function removeNthFromEndIterative(ListNode $head, int $n): ?ListNode
    {
        $fast = $head;
        $slow = $head;

        $i = 1;
        while ($i <= $n && $fast !== null) {
            $fast = $fast->next;
            $i++;
        }

        if ($i <= $n) {
            // n > number of elements
            return $head;
        }
        if ($fast === null) {
            // the element to remove is the first one
            return $head->next;
        }

        while ($fast !== null && $fast->next !== null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }

        $slow->next = $slow->next->next;

        return $head;
    }

    public function removeNthFromEndRecursive(ListNode $head, int $n): ?ListNode
    {
        ['distanceFromEnd' => $distanceFromEnd, 'newHead' => $newHead] = $this->doRemoveNthFromEndRecursive($head, $n, $head);
        $newHead = $n === $distanceFromEnd ? $head->next : $newHead;

        return $newHead;
    }

    private function doRemoveNthFromEndRecursive(ListNode $head, int $n, ?ListNode $current): array
    {
        if (null === $current) {
            return ['distanceFromEnd' => 0, 'newHead' => $head];
        }

        ['distanceFromEnd' => $distanceFromEnd, 'newHead' => $newHead] = $this->doRemoveNthFromEndRecursive($head, $n, $current->next);
        $distanceFromEnd++;
        if ($n + 1 === $distanceFromEnd) {
            $current->next = $current->next->next;
        }

        return ['distanceFromEnd' => $distanceFromEnd, 'newHead' => $newHead];
    }
}
