<?php

namespace App\Lib\List;

class SinglyLinkedListNode
{
    public $val;
    public ?SinglyLinkedListNode $next;

    public function __construct($val, ?SinglyLinkedListNode $next)
    {
        $this->val = $val;
        $this->next = $next;
    }

    /**
     * @param array $list
     * @return static The head of the list
     */
    public static function createLinksFromArray(array $list): ?self
    {
        if ([] === $list) {
            return null;
        }
        
        $head = new self($list[0], null);
        $previous = $head;
        for ($i = 1; $i < count($list); $i++) {
            $current = new self($list[$i], null);
            $previous->next = $current;
            $previous = $current;
        }

        return $head;
    }

    public function toArray(): array
    {
        $result = [];
        $current = $this;
        while ($current !== null) {
            $result[] = $current->val;
            $current = $current->next;
        }

        return $result;
    }
}
