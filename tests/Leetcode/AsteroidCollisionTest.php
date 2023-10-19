<?php

namespace App\Tests\Leetcode;

use App\Leetcode\AsteroidCollision;
use PHPUnit\Framework\TestCase;

class AsteroidCollisionTest extends TestCase
{
    public static function asteroidCollisionProvider(): array
    {
        return [
            [
                'asteroids' => [5, 10, -5],
                'expected' => [5, 10],
            ],
            [
                'asteroids' => [8, -8],
                'expected' => [],
            ],
            [
                'asteroids' => [10, 2, -5],
                'expected' => [10],
            ],
            [
                'asteroids' => [10, 5, 4, 3, -4],
                'expected' => [10, 5],
            ],
            [
                'asteroids' => [-2, -1, 1, 2],
                'expected' => [-2, -1, 1, 2],
            ],
            [
                'asteroids' => [-2, -2, -2, 1],
                'expected' => [-2, -2, -2, 1],
            ],
            [
                'asteroids' => [1, -2, -2, -2],
                'expected' => [-2, -2, -2],
            ],
        ];
    }

    /**
     * @dataProvider asteroidCollisionProvider
     */
    public function testAsteroidCollision(array $asteroids, array $expected): void
    {
        $solution = new AsteroidCollision();
        self::assertSame($expected, $solution->asteroidCollision($asteroids));
    }
}