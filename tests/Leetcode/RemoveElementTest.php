<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RemoveElement;
use PHPUnit\Framework\TestCase;

class RemoveElementTest extends TestCase
{
    public static function removeElementProvider(): array
    {
        return [
            [
                'nums' => [],
                'val' => 1,
                'expected' => [],
            ],
            [
                'nums' => [3, 2, 2, 3],
                'val' => 3,
                'expected' => [2, 2],
            ],
            [
                'nums' => [0, 1, 2, 2, 3, 0, 4, 2],
                'val' => 2,
                'expected' => [0, 1, 3, 0, 4],
            ],
        ];
    }

    /**
     * @dataProvider removeElementProvider
     */
    public function testRemoveElement(array $nums, int $val, array $expected): void
    {
        $solution = new RemoveElement();
        $k = $solution->removeElement($nums, $val);
        self::assertSame(count($expected), $k);
        self::assertSame($expected, array_slice($nums, 0, $k));
    }
}