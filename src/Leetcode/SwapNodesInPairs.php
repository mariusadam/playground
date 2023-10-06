<?php

namespace App\Leetcode;

use App\Lib\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/swap-nodes-in-pairs/
 */
class SwapNodesInPairs
{
    public function swapPairs(?ListNode $head): ?ListNode
    {
        $beforePrev = null;
        $prev = $head;
        $current = $head ? $head->next : null;
        while ($current !== null) {
            $next = $current->next;
            if ($beforePrev === null) {
                $head = $current;
            } else {
                $beforePrev->next = $current;
            }

            $prev->next = $next;
            $current->next = $prev;

            if (null === $next) {
                break;
            }
            // advance 2 more positions
            $beforePrev = $prev;
            $prev = $next;
            $current = $next->next;
        }

        return $head;
    }
}