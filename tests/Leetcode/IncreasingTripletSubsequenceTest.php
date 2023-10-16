<?php

namespace App\Tests\Leetcode;

use App\Leetcode\IncreasingTripletSubsequence;
use PHPUnit\Framework\TestCase;

class IncreasingTripletSubsequenceTest extends TestCase
{
    public function increasingTripletProvider(): array
    {
        return [
            ['nums' => [1, 2, 3, 4, 5], 'expected' => true],
            ['nums' => [5, 4, 3, 2, 1], 'expected' => false],
            ['nums' => [2, 1, 5, 0, 4, 6], 'expected' => true],
            ['nums' => [1, 2, -1, 3], 'expected' => true],
            ['nums' => [1, 1, -2, 6], 'expected' => false],
        ];
    }

    /**
     * @dataProvider increasingTripletProvider
     */
    public function testIncreasingTriplet(array $nums, bool $expected): void
    {
        $solution = new IncreasingTripletSubsequence();
        self::assertSame($expected, $solution->increasingTriplet($nums));
    }
}