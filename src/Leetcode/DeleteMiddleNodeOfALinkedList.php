<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/delete-the-middle-node-of-a-linked-list
 */
class DeleteMiddleNodeOfALinkedList
{
    public function deleteMiddle(ListNode $head): ?ListNode
    {
        $prev = null;
        $current = $head;
        $fast = $head;
        while ($fast !== null && $fast->next !== null) {
            $prev = $current;
            $current = $current->next;
            $fast = $fast->next->next;
        }

        if ($prev === null) {
            return null;
        }

        $prev->next = $current->next;

        return $head;
    }
}