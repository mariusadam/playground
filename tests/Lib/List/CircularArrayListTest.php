<?php

namespace App\Tests\Lib\List;

use App\Lib\List\CircularArrayList;
use OutOfBoundsException;
use PHPUnit\Framework\TestCase;

class CircularArrayListTest extends TestCase
{
    private CircularArrayList $list;

    protected function setUp(): void
    {
        $this->list = new CircularArrayList();
    }

    public static function getOnEmptyListProvider(): array
    {
        return [
            ['index' => 0],
            ['index' => -1],
        ];
    }

    /**
     * @dataProvider getOnEmptyListProvider
     */
    public function testGetOnEmptyList(int $index): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->list->get($index);
    }

    public function testAdd(): void
    {
        $this->list->add(0, 'a');
        $this->list->add(1, 'b');
        $this->list->add(2, 'c');

        self::assertSame('a', $this->list->get(0));
        self::assertSame('b', $this->list->get(1));
        self::assertSame('c', $this->list->get(2));
    }

    public function testRemove(): void
    {
        $this->list->add(0, 'a');
        $this->list->add(1, 'b');
        $this->list->add(2, 'c');

        self::assertSame('b', $this->list->remove(1));
        self::assertSame('a', $this->list->get(0));
        self::assertSame('c', $this->list->get(1));
    }

    public function testRemoveWithInvalidIndex(): void
    {
        $this->expectException(\OutOfBoundsException::class);
        $this->list->remove(13);
    }

    public function testRemoveDownSizezTheBackingArrayWhenAllocatedSpaceIsTooLarge(): void
    {
        $this->list->add(0, 'a');
        $this->list->add(1, 'b');
        $this->list->add(2, 'c');

        self::assertSame(['a', 'b', 'c', null], $this->extractBackingArray());
        self::assertSame('a', $this->list->remove(0));
        self::assertSame([null, 'b', 'c', null], $this->extractBackingArray());
        self::assertSame('b', $this->list->remove(0));
        self::assertSame(['c', null], $this->extractBackingArray());
    }

    public function testSet(): void
    {
        $this->list->add(0, 'a');
        $this->list->add(1, 'b');
        self::assertSame('b', $this->list->get(1));
        self::assertSame('b', $this->list->set(1, 'other'));
        self::assertSame('other', $this->list->get(1));
    }

    public function testSetWithInvalidIndex(): void
    {
        $this->expectException(OutOfBoundsException::class);

        $this->list->set(0, 'test');
    }

    public function testAddWithInvalidOffset(): void
    {
        $this->expectException(OutOfBoundsException::class);

        $this->list->add(3, 'test');
    }

    private function extractBackingArray(): array
    {
        $property = new \ReflectionProperty($this->list, 'backingArray');
        $property->setAccessible(true);

        return $property->getValue($this->list);
    }
}