<?php

namespace App\Leetcode;

/**
 * @link https://leetcode.com/problems/dota2-senate
 */
class Dota2Senate
{
    public function predictPartyVictory(string $senate): string
    {
        $radiantCount = 0;
        $direCount = 0;
        $queue = new \SplQueue();
        for ($i = 0; $i < strlen($senate); $i++) {
            if ($senate[$i] === 'R') {
                $radiantCount++;
            } else {
                $direCount++;
            }
            $queue->enqueue($senate[$i]);
        }

        $bannedDires = 0;
        $bannedRadiants = 0;
        while ($radiantCount > 0 && $direCount > 0) {
            $current = $queue->dequeue();
            if ($current === 'R') {
                if ($bannedRadiants > 0) {
                    $bannedRadiants--;
                    $radiantCount--;
                } else {
                    $bannedDires++;
                    $queue->enqueue($current);
                }
            } else {
                if ($bannedDires > 0) {
                    $bannedDires--;
                    $direCount--;
                } else {
                    $bannedRadiants++;
                    $queue->enqueue($current);
                }
            }
        }

        return $radiantCount > 0 ? 'Radiant' : 'Dire';
    }
}