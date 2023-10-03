<?php

namespace App\Leetcode;

class AddTwoNumbersListNode
{
    public int $val;
    public ?AddTwoNumbersListNode $next;

    public function __construct(int $val, ?AddTwoNumbersListNode $next)
    {
        $this->val = $val;
        $this->next = $next;
    }
}
