<?php

namespace App\Tests\Leetcode;
use App\Leetcode\DominoAndTrominoTiling;
use PHPUnit\Framework\TestCase;

class DominoAndTrominoTilingTest extends TestCase
{
    public static function numTilingsProvider(): array
    {
        return [
            ['n' => 1, 'expected' => 1],
            ['n' => 2, 'expected' => 2],
            ['n' => 3, 'expected' => 5],
            ['n' => 4, 'expected' => 11],
            ['n' => 5, 'expected' => 24],
        ];
    }

    /**
     * @dataProvider numTilingsProvider
     */
    public function testNumTilings(int $n, int $expected): void
    {
        $solution = new DominoAndTrominoTiling();
        self::assertSame($expected, $solution->numTilings($n));
    }
}