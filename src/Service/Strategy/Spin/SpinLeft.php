<?php

namespace App\Service\Strategy\Spin;

class SpinLeft implements SpinStrategyInterface
{
    public function makeSpin(string $way): string
    {
        switch ($way) {
            case self::EAST:
                return self::NORTH;
            case self::NORTH:
                return self::WEST;
            case self::WEST:
                return self::SOUTH;
            case self::SOUTH:
                return self::EAST;
            default:
                return $way;
        }
    }

    public function getInstruction(): string
    {
        return self::LEFT;
    }
}