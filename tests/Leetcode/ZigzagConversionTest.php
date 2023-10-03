<?php

namespace App\Tests\Leetcode;

use App\Leetcode\ZigzagConversion;
use PHPUnit\Framework\TestCase;

class ZigzagConversionTest extends TestCase
{
    public static function convertProvider(): array
    {
        return [
            [
                'input' => 'PAYPALISHIRING',
                'numRows' => 3,
                'expectedOutput' => 'PAHNAPLSIIGYIR'
            ],
            [
                'input' => 'PAYPALISHIRING',
                'numRows' => 4,
                'expectedOutput' => 'PINALSIGYAHRPI'
            ],
            [
                'input' => 'A',
                'numRows' => 1,
                'expectedOutput' => 'A'
            ],
        ];
    }

    /**
     * @dataProvider convertProvider
     */
    public function testConvert(string $input, int $numRows, string $expectedOutput): void
    {
        $solution = new ZigzagConversion();
        self::assertSame($expectedOutput, $solution->convert($input, $numRows));
    }
}
