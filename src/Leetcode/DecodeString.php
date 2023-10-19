<?php

namespace App\Leetcode;

interface SegmentInterface
{
    public function evaluate(): string;
}

class SimpleSegment implements SegmentInterface
{
    public function __construct(private readonly string $rawSegment)
    {
    }

    public function evaluate(): string
    {
        return $this->rawSegment;
    }
}

class RepeatableSegment implements SegmentInterface
{
    /** @var array<SegmentInterface> */
    private array $subSegments = [];

    private int $frequency;

    private ?RepeatableSegment $parent;

    public function __construct(int $frequency, ?RepeatableSegment $parent)
    {
        $this->frequency = $frequency;
        $this->parent = $parent;
    }

    public function getParent(): ?RepeatableSegment
    {
        return $this->parent;
    }

    public function addSimpleSegment(string $segment): void
    {
        $this->subSegments[] = new SimpleSegment($segment);
    }

    public function addRepeatableSegment(int $frequency): self
    {
        $subSegment = new RepeatableSegment($frequency, $this);
        $this->subSegments[] = $subSegment;

        return $subSegment;
    }

    public function isEmpty(): bool
    {
        return $this->subSegments === [];
    }

    public function evaluate(): string
    {
        $str = '';
        foreach ($this->subSegments as $subSegment) {
            $str .= $subSegment->evaluate();
        }

        return str_repeat($str, $this->frequency);
    }
}

/**
 * @link https://leetcode.com/problems/decode-string
 */
class DecodeString
{
    public function decodeString(string $s): string
    {
        $decoded = '';
        $length = strlen($s);
        $frequencyStr = '';
        $segment = '';
        $currentSegment = new RepeatableSegment(1, null);
        for ($i = 0; $i < $length; $i++) {
            if ($s[$i] === '[') {
                if ($segment !== '') {
                    $currentSegment->addSimpleSegment($segment);
                    $segment = '';
                }
                $currentSegment = $currentSegment->addRepeatableSegment($frequencyStr);
                $frequencyStr = '';
            } elseif ($s[$i] === ']') {
                if ($segment !== '') {
                    $currentSegment->addSimpleSegment($segment);
                    $segment = '';
                }
                $currentSegment = $currentSegment->getParent();
            } elseif ($s[$i] >= '0' && $s[$i] <= '9') {
                $frequencyStr .= $s[$i];
            } elseif ($s[$i] >= 'a' && $s[$i] <= 'z') {
                $segment .= $s[$i];
            }

            if ($currentSegment->getParent() !== null) {
                continue;
            }

            if ($currentSegment->isEmpty() && $segment !== '') {
                $decoded .= $segment;
                $segment = '';
            }
            if (!$currentSegment->isEmpty()) {
                $current = $currentSegment->evaluate();
                $decoded .= $current;
                $currentSegment = new RepeatableSegment(1, null);
            }
        }

        return $decoded;
    }
}
