<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/reverse-nodes-in-k-group/
 */
class ReverseNodesInKGroup
{
    public function reverseKGroup(ListNode $head, int $k): ListNode
    {
        $current = $head;
        $currentHead = $head;
        $currentTail = $head;
        $prevTail = null;
        $finalHead = null;
        $i = 0;
        while ($current !== null) {
            $i++;
            $oldCurrent = $current;
            $currentTail->next = $current->next;
            if ($current !== $currentHead) {
                // move element at the front of the list
                $current->next = $currentHead;
            }
            $current = $currentTail->next;
            $currentHead = $oldCurrent;
            if ($prevTail !== null) {
                // link previous list tail with the current head
                $prevTail->next = $currentHead;
            }

            if ($i === $k) {
                // we have completed a list of length k, reset current head and tail and remeber the previous tail
                $finalHead = $finalHead ?? $currentHead;
                $prevTail = $currentTail;
                $currentHead = $current;
                $currentTail = $current;
                $i = 0;
            }
        }

        // current head is not null when we are left with a list with length < k, so reverse all its elements to the original ordering
        if ($currentHead !== null) {
            $prevTail->next = $this->reverseKGroup($currentHead, $i);
        }

        return $finalHead;
    }
}
