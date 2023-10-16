<?php

namespace App\Tests\Leetcode;

use App\Leetcode\UniqueNumberOfOccureneces;
use PHPUnit\Framework\TestCase;

class UniqueNumberOfOccurenecesTest extends TestCase
{
    public static function uniqueOccurencesProvider(): array
    {
        return [
            ['arr' => [1, 2], 'expected' => false],
            ['arr' => [1, 2, 2, 1, 1, 3], 'expected' => true],
            ['arr' => [-3, 0, 1, -3, 1, 1, 1, -3, 10, 0], 'expected' => true],
        ];
    }

    /**
     * @dataProvider uniqueOccurencesProvider
     */
    public function testUniqueOccurencesUsingArrayCount(array $arr, bool $expected): void
    {
        $solution = new UniqueNumberOfOccureneces();
        self::assertSame($expected, $solution->uniqueOccurrencesUsingArrayCount($arr));
    }

        /**
     * @dataProvider uniqueOccurencesProvider
     */
    public function testUniqueOccurrencesUsingStopCondition(array $arr, bool $expected): void
    {
        $solution = new UniqueNumberOfOccureneces();
        self::assertSame($expected, $solution->uniqueOccurrencesUsingStopCondition($arr));
    }
}