<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/maximum-twin-sum-of-a-linked-list
 */
class MaximumTwinSumOfALinkedList
{
    public function pairSum(ListNode $head): int
    {
        $slow = $head;
        $fast = $head;
        $firstHalfValues = [];
        while ($fast !== null) {
            $firstHalfValues[] = $slow->val;
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // slow is now pointing to the first node in the second half of the list
        $maxSum = 0;
        $secondHalf = $slow;
        while ($secondHalf !== null) {
            $firstHalfValue = array_pop($firstHalfValues);
            $maxSum = max($maxSum, $firstHalfValue + $secondHalf->val);
            $secondHalf = $secondHalf->next;
        }

        return $maxSum;
    }

    public function pairSumWithReversedList(ListNode $head): int
    {
        $slow = $head;
        $fast = $head->next;
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        // slow is now pointing to the second half
        $maxSum = 0;
        $secondHalf = $slow->next;
        //reverse the second half
        $reversedSecondHalf = $this->reverseList($secondHalf);

        $first = $head;
        $second = $reversedSecondHalf;
        while ($second !== null) {
            $maxSum = max($maxSum, $first->val + $second->val);
            $first = $first->next;
            $second = $second->next;
        }

        return $maxSum;
    }

    private function reverseList(ListNode $head): ListNode
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
}