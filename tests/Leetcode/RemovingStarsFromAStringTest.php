<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RemovingStarsFromAString;
use PHPUnit\Framework\TestCase;

class RemovingStarsFromAStringTest extends TestCase
{
    public static function removeStarsProvider(): array
    {
        return [
            [
                's' => 'leet**cod*e',
                'e' => 'lecoe',
            ],
            [
                's' => 'erase*****',
                'e' => '',
            ],
        ];
    }

    /**
     * @dataProvider removeStarsProvider
     */
    public function testRemoveStars(string $s, string $expected): void
    {
        $solution = new RemovingStarsFromAString();
        self::assertSame($expected, $solution->removeStars($s));
    }
}