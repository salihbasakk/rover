<?php

namespace App\Service\Strategy\Movement;

use Exception;

class GoForward implements MovementStrategyInterface
{
    public function makeMove($width, $height, $x, $y, $z): array
    {
        switch ($z) {
            case self::EAST:
                if ($x === $width) {
                    throw new Exception('Rover is crashed!');
                }
                return [$x + 1, $y, $z];
            case self::NORTH:
                if ($y === $height) {
                    throw new Exception('Rover is crashed!');
                }
                return [$x, $y + 1, $z];
            case self::WEST:
                if ($x === 0) {
                    throw new Exception('Rover is crashed!');
                }
                return [$x - 1, $y, $z];
            case self::SOUTH:
                if ($y === 0) {
                    throw new Exception('Rover is crashed!');
                }
                return [$x, $y - 1, $z];
            default:
                return [$x, $y, $z];
        }
    }

    public function getInstruction(): string
    {
        return self::MOVE;
    }
}