<?php

namespace App\Leetcode;

class GenerateParenthesis
{
    private const SOLUTION_ELEMENT_MAX_VALUE = 1;
    private const SOLUTION_ELEMENT_OPEN_PARANTHESIS = 0;
    private const SOLUTION_ELEMENT_CLOSED_PARANTHESIS = 1;

    /** @var array<string> */
    private array $solutionsList = [];
    private int $solutionSize;

    /**
     * @return array<int>
     */
    public function generateParenthesis(int $n): array
    {
        $this->solutionSize = $n * 2;
        $solution = array_fill(0, $this->solutionSize, -1);
        $this->solutionsList = [];
        $level = 0;
        while ($level >= 0) {
            $solution[$level]++;
            if ($solution[$level] > self::SOLUTION_ELEMENT_MAX_VALUE) {
                $solution[$level] = -1;
                $level--;
                continue;
            }

            if ($this->shouldSkip($solution, $level)) {
                continue;
            }

            if ($level < $this->solutionSize - 1) {
                $level++;
                continue;
            }

            $this->collectSolution($solution);

        }

        return $this->solutionsList;
    }

    private function shouldSkip(array $solution, int $level): bool
    {
        $expectedValuesStack = [];
        for ($i = 0; $i <= $level; $i++) {
            if (self::SOLUTION_ELEMENT_OPEN_PARANTHESIS === $solution[$i]) {
                $expectedValuesStack[] = self::SOLUTION_ELEMENT_CLOSED_PARANTHESIS;
                continue;
            }

            $expectedValue = array_pop($expectedValuesStack);
            if ($expectedValue !== $solution[$i]) {
                return true;
            }
        }

        return count($expectedValuesStack) > $this->solutionSize - $level - 1;
    }

    private function collectSolution(array $solution): void
    {
        $paranthesis = '';
        for ($i = 0; $i < $this->solutionSize; $i++) {
            $paranthesis .= self::SOLUTION_ELEMENT_OPEN_PARANTHESIS === $solution[$i] ? '(' : ')';
        }

        $this->solutionsList[] = $paranthesis;
    }
    
    /**
     * @return array<int>
     */
    public function generateParenthesisAlternative(int $n): array
    {
        $maxLength = 2 * $n;
        $result = [];
        $left = 0;
        $right = 0;
        $q = [[$left, $right, '']];
        while ([] !== $q) {
            [$left, $right, $s] = array_shift($q);
            if (strlen($s) === $maxLength) {
                $result[] = $s;
            }
            if ($left < $n) {
                $q[] = [$left + 1, $right, $s . '('];
            }
            if ($right < $left) {
                $q[] = [$left, $right + 1, $s . ')'];
            }
        }

        return $result;
    }
}