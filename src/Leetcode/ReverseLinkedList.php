<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/reverse-linked-list
 */
class ReverseLinkedList
{
    public function reverseListIteratively(?ListNode $head): ?ListNode
    {
        $prev = null;
        $current = $head;
        while ($current !== null) {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        return $prev;
    }

    public function reverseListRecursively(?ListNode $head): ?ListNode
    {
        if (null === $head || $head->next === null) {
            return $head;
        }

        $newHead = $this->reverseListRecursively($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $newHead;
    }
}