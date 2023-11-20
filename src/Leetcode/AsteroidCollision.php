<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/asteroid-collision
 */
class AsteroidCollision
{
    public function asteroidCollision(array $asteroids): array
    {
        $asteroidsStack = [];
        foreach ($asteroids as $asteroidSize) {
            if ($asteroidsStack === []) {
                $asteroidsStack[] = $asteroidSize;
                continue;
            }

            $incomingSize = $asteroidSize;
            $mutualExplosion = false;
            while ($asteroidsStack !== []) {
                $previous = array_pop($asteroidsStack);
                $willCollide = $previous > 0 && $incomingSize < 0;

                if ($willCollide) {
                    // no collision possible, none explodes
                    $asteroidsStack[] = $previous;
                    $asteroidsStack[] = $incomingSize;
                    break;
                }

                if (abs($previous) === abs($incomingSize)) {
                    $mutualExplosion = true;
                    // same size, both explode
                    break;
                }


                // decide which asteroid remains after collision
                $incomingSize = abs($previous) > abs($incomingSize) ? $previous : $incomingSize;
            }
            if ($asteroidsStack === [] && !$mutualExplosion) {
                $asteroidsStack[] = $incomingSize;
            }
        }

        return $asteroidsStack;
    }
}
