<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ProductOfArrayExceptSelf;
use PHPUnit\Framework\TestCase;

class ProductOfArrayExceptSelfTest extends TestCase
{
    public static function productExceptSelfProvider(): array
    {
        return [
            [
                'nums' => [1, 2, 3, 4],
                'expected' => [24, 12, 8, 6],
            ],
            [
                'nums' => [-1, 1, 0, -3, 3],
                'expected' => [0, 0, 9, 0, 0],
            ],
            [
                'nums' => [3, 2],
                'expected' => [2, 3],
            ],
        ];
    }

    /**
     * @dataProvider productExceptSelfProvider
     */
    public function testProductExceptSelf(array $nums, array $expected): void
    {
        $solution = new ProductOfArrayExceptSelf();
        self::assertSame($expected, $solution->productExceptSelf($nums));
    }
}