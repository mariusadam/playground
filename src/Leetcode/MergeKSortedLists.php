<?php

namespace App\Leetcode;

use App\Lib\SinglyLinkedListNode as ListNode;

class MergeKSortedLists
{
    /**
     * @param ListNode[] $lists
     */
    public function mergeKLists(array $lists): ?ListNode
    {
        $mergedListHead = null;
        while ([] !== $lists) {
            $mergedListCurrent = $mergedListHead;
            $mergedListPrev = null;
            $list = array_pop($lists);
            $listCurrent = $list;
            if (null === $mergedListHead) {
                $mergedListHead = $listCurrent;
                continue;
            }

            while (null !== $listCurrent && null !== $mergedListCurrent) {
                if ($listCurrent->val < $mergedListCurrent->val) {
                    $listNext = $listCurrent->next;
                    $listCurrent->next = $mergedListCurrent;
                    if (null === $mergedListPrev) {
                        $mergedListHead = $listCurrent;
                    } else {
                        $mergedListPrev->next = $listCurrent;
                    }
                    $mergedListPrev = $listCurrent;
                    $listCurrent = $listNext;
                } else {
                    $mergedListPrev = $mergedListCurrent;
                    $mergedListCurrent = $mergedListCurrent->next;
                }
            }

            if (null === $mergedListCurrent && null !== $listCurrent) {
                $mergedListPrev->next = $listCurrent;
            }
        }

        return $mergedListHead;
    }

    /**
     * @param ListNode[] $lists
     */
    public function mergeKListsUsingMinHeap(array $lists): ?ListNode
    {
        $heap = new \SplMinHeap();
        foreach ($lists as $list) {
            if ($list) {
                $heap->insert([$list->val, $list]);
            }
        }

        $headResultList = new ListNode(0, null);
        $resultList = $headResultList;
        while (!$heap->isEmpty()) {
            $minElementFromHeap = $heap->extract();
            $resultList->next = new ListNode($minElementFromHeap[0], null);
            $resultList = $resultList->next;
            $minElementFromHeap[1] = $minElementFromHeap[1]->next;
            if ($minElementFromHeap[1]) {
                $heap->insert([$minElementFromHeap[1]->val, $minElementFromHeap[1]]);
            }
        }
        return $headResultList->next;
    }


    /**
     * @param ListNode[] $lists
     */
    public function mergeKListsUsingSort(array $lists): ?ListNode
    {
        $allValues = [];
        while ([] !== $lists) {
            $list = array_pop($lists);
            while (null !== $list) {
                $allValues[] = $list->val;
                $list = $list->next;
            }
        }

        rsort($allValues);

        $resultHead = null;
        foreach ($allValues as $value) {
            $resultHead = new ListNode($value, $resultHead);  
        }

        return $resultHead;
    }
}