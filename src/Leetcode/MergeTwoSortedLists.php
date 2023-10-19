<?php

namespace App\Leetcode;

use App\Lib\List\SinglyLinkedListNode as ListNode;

/**
 * @link https://leetcode.com/problems/merge-two-sorted-lists/
 */
class MergeTwoSortedLists
{
    public function mergeTwoLists(?ListNode $list1, ?ListNode $list2): ?ListNode
    {
        $mergedListHead = null;
        $mergeListPrev = null;
        $current1 = $list1;
        $current2 = $list2;
        while ($current1 !== null && $current2 !== null) {
            $nodeToAdd = null;
            if ($current1->val < $current2->val) {
                $nodeToAdd = $current1;
                $current1 = $current1->next;
            } else {
                $nodeToAdd = $current2;
                $current2 = $current2->next;
            }

            ['head' => $mergedListHead, 'prev' => $mergeListPrev] = $this->addNodeToList($mergedListHead, $mergeListPrev, $nodeToAdd);
        }

        ['head' => $mergedListHead, 'prev' => $mergeListPrev] = $this->copyElements($current1, $mergeListPrev, $mergedListHead);
        ['head' => $mergedListHead, 'prev' => $mergeListPrev] = $this->copyElements($current2, $mergeListPrev, $mergedListHead);

        return $mergedListHead;
    }

    private function copyElements(?ListNode $source, ?ListNode $destPrev, ?ListNode $destHead): array
    {
        $currentSource = $source;
        $prev = $destPrev;
        $head = $destHead;
        while (null !== $currentSource) {
            ['head' => $head, 'prev' => $prev] = $this->addNodeToList($head, $prev, $currentSource);
            $currentSource = $currentSource->next;
        }

        return ['head' => $head, 'prev' => $prev];
    }

    private function addNodeToList(?ListNode $head, ?ListNode $prev, ListNode $nodeToAdd): array
    {
        $newNode = new ListNode($nodeToAdd->val, null);
        if (null === $prev) {
            return ['head' => $newNode, 'prev' => $newNode];
        }
        
        $prev->next = $newNode;
        
        return ['head' => $head, 'prev' => $newNode];
    } 
}
