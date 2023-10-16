<?php

namespace App\Tests\Leetcode;
use App\Leetcode\FindTheIndexOfTheFirstOccurenceInAStringKmp;
use PHPUnit\Framework\TestCase;

class FindTheIndexOfTheFirstOccurenceInAStringKmpTest extends TestCase
{
    public static function strStrProvider(): array
    {
        return [
            [
                'haystack' => 'sadbutsad',
                'needle' => 'sad',
                'expectedOffset' => 0,
            ],
            [
                'haystack' => 'leetcode',
                'needle' => 'leeto',
                'expectedOffset' => -1,
            ],
            [
                'haystack' => 'letletletd',
                'needle' => 'letletd',
                'expectedOffset' => 3,
            ],
        ];
    }

    /**
     * @dataProvider strStrProvider
     */
    public function testStrStr(string $haystack, string $needle, int $expectedOffset): void
    {
        $solution = new FindTheIndexOfTheFirstOccurenceInAStringKmp();
        self::assertSame($expectedOffset, $solution->strStr($haystack, $needle));
    }
}