<?php

namespace App\Helpers;

class RoversDB
{
    public static function rovers(): array
    {
        return [
            '1' => ['x' => 5, 'y' => 10, 'z' => 'N'],
            '2' => ['x' => 10, 'y' => 20, 'z' => 'E'],
            '3' => ['x' => 0, 'y' => 0, 'z' => 'S'],
        ];
    }
}