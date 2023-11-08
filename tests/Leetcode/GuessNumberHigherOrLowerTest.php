<?php

namespace App\Tests\Leetcode;

use App\Leetcode\GuessNumberHigherOrLower;
use PHPUnit\Framework\TestCase;

class GuessNumberHigherOrLowerTest extends TestCase
{
    public static function guessNumberProvider(): array
    {
        return [
            ['n' => 10, 'pick' => 6],
            ['n' => 1, 'pick' => 1],
            ['n' => 2, 'pick' => 1],
        ];
    }

    /**
     * @dataProvider guessNumberProvider
     */
    public function testGuessNumber(int $n, int $pick): void
    {
        $solution = new GuessNumberHigherOrLower($pick);
        self::assertSame($pick, $solution->guessNumber($n));
    }
}