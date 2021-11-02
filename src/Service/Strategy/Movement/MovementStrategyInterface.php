<?php

namespace App\Service\Strategy\Movement;

interface MovementStrategyInterface
{
    public const MOVE  = 'M';
    public const EAST  = 'E';
    public const WEST  = 'W';
    public const NORTH = 'N';
    public const SOUTH = 'S';

    public function makeMove($width, $height, $x, $y, $z);

    public function getInstruction();
}