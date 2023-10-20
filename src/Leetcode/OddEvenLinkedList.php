<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/odd-even-linked-list/description
 */
class OddEvenLinkedList
{
    public function oddEvenList(?ListNode $head): ?ListNode
    {
        if (null === $head || $head->next === null) {
            return $head;
        }

        $counter = 3;
        $oddTail = $head;
        $evenHead = $head->next;
        $prev = $head->next;
        $current = $evenHead->next;
        while ($current !== null) {
            $next = $current->next;
            if ($counter % 2 !== 0) {
                // move current between oddTail and evenHead, update oddTail
                $prev->next = $next;
                $current->next = $evenHead;
                $oddTail->next = $current;
                $oddTail = $current;
            } else {
                $prev = $current;
            }

            $current = $next;
            $counter++;
        }

        return $head;
    }
    
    public function oddEvenListWithoutCounter(?ListNode $head): ?ListNode
    {
        if (null === $head) {
            return $head;
        }

        $oddCurrent = $head;
        $evenHead = $head->next;
        $evenCurrent = $head->next;
        while ($evenCurrent !== null && $evenCurrent->next !== null) {
            // jump 2 positions to create the right link for each type of list 
            $oddCurrent->next = $oddCurrent->next->next;
            $evenCurrent->next = $evenCurrent->next->next;

            $oddCurrent = $oddCurrent->next;
            $evenCurrent = $evenCurrent->next;
        }

        $oddCurrent->next = $evenHead;

        return $head;
    }
}