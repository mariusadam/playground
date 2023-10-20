<?php

namespace App\Tests\Leetcode;

use App\Leetcode\Dota2Senate;
use PHPUnit\Framework\TestCase;

class Dota2SenateTest extends TestCase
{
    public static function predictPartyVictoryProvider(): array
    {
        return [
            [
                'senate' => 'RD',
                'expected' => 'Radiant',
            ],
            [
                'senate' => 'RDD',
                'expected' => 'Dire',
            ],
            [
                'senate' => 'DDRRRR',
                'expected' => 'Radiant',
            ],
            [
                'senate' => 'DRRDRDRDRDDRDRDR',
                'expected' => 'Radiant',
            ],
        ];
    }

    /**
     * @dataProvider predictPartyVictoryProvider
     */
    public function testPredictPartyVictory(string $senate, string $expected): void
    {
        $solution = new Dota2Senate();
        self::assertSame($expected, $solution->predictPartyVictory($senate));
    }
}