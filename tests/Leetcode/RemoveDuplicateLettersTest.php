<?php

namespace App\Tests\Leetcode;

use App\Leetcode\RemoveDuplicateLetters;
use PHPUnit\Framework\TestCase;

class RemoveDuplicateLettersTest extends TestCase
{
    public static function removeDuplicateLettersProvider(): array
    {
        return [
            ['bcabc', 'abc'],
            ['cbacdcbc', 'acdb'],
            ['bbcaac', 'bac'],
            ['abacb', 'abc'],
            ['thesqtitxyetpxloeevdeqifkz', 'hesitxyplovdqfkz'],
            ['cdadabcc', 'adbc'],
        ];
    }

    /**
     * @dataProvider removeDuplicateLettersProvider
     */
    public function testRemoveDuplicateLetters(string $input, string $expectedOutput): void
    {
        $resolver = new RemoveDuplicateLetters();
        self::assertSame($expectedOutput, $resolver->removeDuplicateLetters($input));
    }
}
