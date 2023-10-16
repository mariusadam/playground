<?php

namespace App\Tests\Leetcode;
use App\Leetcode\DivideTwoIntegers;
use PHPUnit\Framework\TestCase;

class DivideTwoIntegersTest extends TestCase
{
    public static function divideProvider(): array
    {
        return [
            ['dividend' => 10, 'divisor' => 3, 'quotient' => 3],
            ['dividend' => 7, 'divisor' => -3, 'quotient' => -2],
            ['dividend' => DivideTwoIntegers::INT_MIN, 'divisor' => -1, 'quotient' => DivideTwoIntegers::INT_MAX],
            ['dividend' => DivideTwoIntegers::INT_MIN, 'divisor' => DivideTwoIntegers::INT_MIN, 'quotient' => 1],
            ['dividend' => DivideTwoIntegers::INT_MIN, 'divisor' => 1, 'quotient' => DivideTwoIntegers::INT_MIN],
            ['dividend' => DivideTwoIntegers::INT_MIN, 'divisor' => -3, 'quotient' => 715827882],
        ];
    }

    /**
     * @dataProvider divideProvider
     */
    public function testDivide(int $dividend, int $divisor, int $expectedQuotient): void
    {
        $solution = new DivideTwoIntegers();
        self::assertSame($expectedQuotient, $solution->divide($dividend, $divisor));
    }
}