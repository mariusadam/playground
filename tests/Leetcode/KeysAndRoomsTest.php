<?php

namespace App\Tests\Leetcode;

use App\Leetcode\KeysAndRooms;
use PHPUnit\Framework\TestCase;

class KeysAndRoomsTest extends TestCase
{
    public static function canVisitAllRoomsProvider(): array
    {
        return [
            [
                'rooms' => [[1], [2], [3], []],
                'expected' => true,
            ],
            [
                'rooms' => [[1, 3], [3, 0, 1], [2], [0]],
                'expected' => false,
            ],
        ];
    }

    /**
     * @dataProvider canVisitAllRoomsProvider
     */
    public function testCanVisitAllRooms(array $rooms, bool $expected): void
    {
        $solution = new KeysAndRooms();
        self::assertSame($expected, $solution->canVisitAllRooms($rooms));
    }
}