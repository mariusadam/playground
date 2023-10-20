<?php

namespace App\Lib\List;

class CircularArrayList
{
    private int $startIndex = 0;
    private int $numberOfElements = 0;
    private array $backingArray = [];
    private int $backingArraySize = 0;

    public function get(int $index): mixed
    {
        $this->errorIfOutOfBounds($index);

        return $this->backingArray[$this->adjustOffset($index)];
    }

    public function set(int $index, mixed $newValue): mixed
    {
        $this->errorIfOutOfBounds($index);

        $oldValue = $this->backingArray[$this->adjustOffset($index)];
        $this->backingArray[$this->adjustOffset($index)] = $newValue;

        return $oldValue;
    }

    public function add(int $index, mixed $value): void
    {
        if ($index < 0 || $index > $this->numberOfElements) {
            throw new \OutOfBoundsException();
        }
        if ($this->numberOfElements + 1 > $this->backingArraySize) {
            $this->resize();
        }
        if ($index < $this->numberOfElements / 2) { // shift [0] ... [index - 1] to the left one position
            $this->startIndex = $this->startIndex === 0 ? $this->backingArraySize - 1 : $this->startIndex - 1;
            for ($k = 0; $k <= $index - 1; $k++) {
                $this->backingArray[$this->adjustOffset($k)] = $this->backingArray[$this->adjustOffset($k + 1)];
            }
        } else { // shift [index] ... [numberOfElements - 1] to the right one position
            for ($k = $this->numberOfElements; $k > $index; $k--) {
                $this->backingArray[$this->adjustOffset($k)] = $this->backingArray[$this->adjustOffset($k - 1)];
            }
        }

        $this->backingArray[$this->adjustOffset($index)] = $value;
        $this->numberOfElements++;
    }

    public function remove(int $index): mixed
    {
        $this->errorIfOutOfBounds($index);

        $element = $this->backingArray[$this->adjustOffset($index)];
        if ($index < $this->numberOfElements / 2) { // shift [0] ... [index - 1] to the right one position
            $this->backingArray[$this->adjustOffset($index)] = null;
            for ($k = $index; $k > 0; $k--) {
                $this->backingArray[$this->adjustOffset($k)] = $this->backingArray[$this->adjustOffset($k - 1)];
            }
            $this->startIndex = $this->adjustOffset(1);
        } else { // shift [index + 1] ... [numberOfElements - 1] to the left one position
            for ($k = $index; $k < $this->numberOfElements - 1; $k++) {
                $this->backingArray[$this->adjustOffset($k)] = $this->backingArray[$this->adjustOffset($k + 1)];
            }
        }
        $this->numberOfElements--;

        if ($this->backingArraySize > $this->numberOfElements * 3) {
            $this->resize();
        }

        return $element;
    }

    private function adjustOffset(int $offset): int
    {
        return ($this->startIndex + $offset) % $this->backingArraySize;
    }

    private function errorIfOutOfBounds(int $index): void
    {
        if ($index < 0 || $index > $this->numberOfElements - 1) {
            throw new \OutOfBoundsException();
        }
    }

    private function resize(): void
    {
        $oldArray = $this->backingArray;
        $oldArraySize = $this->backingArraySize;

        $this->backingArraySize = max(2 * $this->numberOfElements, 1);
        $this->backingArray = array_fill(0, $this->backingArraySize, null);
        for ($i = 0; $i < $this->numberOfElements; $i++) {
            $this->backingArray[$i] = $oldArray[($this->startIndex + $i) % $oldArraySize];
        }

        $this->startIndex = 0;
    }
}