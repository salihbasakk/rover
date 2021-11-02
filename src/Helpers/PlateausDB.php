<?php

namespace App\Helpers;

class PlateausDB
{
    public static function plateaus(): array
    {
        return [
            '1' => ['width' => 5, 'height' => 10],
            '2' => ['width' => 10, 'height' => 20],
            '3' => ['width' => 0, 'height' => 0],
        ];
    }
}