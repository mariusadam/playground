<?php

namespace App\Leetcode;

use App\Lib\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/add-two-numbers/
 */
class AddTwoNumbers
{
    public function addTwoNumbers(ListNode $list1, ListNode $list2): ListNode
    {
        $overflow = 0;
        $resultHead = null;
        $resultPreviousNode = null;
        $list1CurrentNode = $list1;
        $list2CurrentNode = $list2;
        while ($list1CurrentNode !== null || $list2CurrentNode !== null || $overflow !== 0) {
            $digitSum = $overflow;
            if ($list1CurrentNode !== null) {
                $digitSum += $list1CurrentNode->val;
                $list1CurrentNode = $list1CurrentNode->next;
            }
            if ($list2CurrentNode !== null) {
                $digitSum += $list2CurrentNode->val;
                $list2CurrentNode = $list2CurrentNode->next;
            }

            $overflow = 0;
            $currentVal = $digitSum;
            if ($digitSum >= 10) {
                $overflow = 1;
                $currentVal = $digitSum - 10;
            }

            $resultCurrentNode = new ListNode($currentVal, null);
            if (null !== $resultPreviousNode) {
                $resultPreviousNode->next = $resultCurrentNode;
            }
            if (null === $resultHead) {
                $resultHead = $resultCurrentNode;
            }
            $resultPreviousNode = $resultCurrentNode;
        }

        return $resultHead;
    }
}