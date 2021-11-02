<?php

namespace App\Service\Strategy\Spin;

interface SpinStrategyInterface
{
    public const LEFT  = 'L';
    public const RIGHT = 'R';
    public const EAST  = 'E';
    public const WEST  = 'W';
    public const NORTH = 'N';
    public const SOUTH = 'S';

    public function makeSpin(string $way): string;

    public function getInstruction(): string;
}