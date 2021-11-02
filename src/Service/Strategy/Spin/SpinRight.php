<?php

namespace App\Service\Strategy\Spin;

class SpinRight implements SpinStrategyInterface
{
    public function makeSpin(string $way): string
    {
        switch ($way) {
            case self::EAST:
                return self::SOUTH;
            case self::SOUTH:
                return self::WEST;
            case self::WEST:
                return self::NORTH;
            case self::NORTH:
                return self::EAST;
            default:
                return $way;
        }
    }

    public function getInstruction(): string
    {
        return self::RIGHT;
    }
}