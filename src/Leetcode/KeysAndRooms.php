<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/keys-and-rooms
 */
class KeysAndRooms
{
    /**
     * @param array<int> $rooms
     */
    public function canVisitAllRooms(array $rooms): bool
    {
        $visited = array_fill(0, count($rooms), false);
        $this->visitRooms($rooms, 0, $visited);

        foreach ($visited as $flag) {
            if (!$flag) {
                return false;
            }
        }

        return true;
    }

    private function visitRooms(array $rooms, int $currentRoom, array &$visited): void
    {
        if ($visited[$currentRoom]) {
            return;
        }

        $visited[$currentRoom] = true;
        foreach ($rooms[$currentRoom] as $room) {
            $this->visitRooms($rooms, $room, $visited);
        }
    }
}