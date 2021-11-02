<?php

namespace App\Helpers;

use App\Service\Strategy\Parameters;

class ParametersBuilderHelper
{
    public static function buildParameters(?int $width, ?int $height, ?int $x, ?int $y, ?string $z): Parameters
    {
        return (new Parameters())
            ->setX($x)
            ->setY($y)
            ->setZ($z)
            ->setWidth($width)
            ->setHeight($height);
    }

    public static function resetParameters(?int $x, ?int $y, ?string $z, $parameters): Parameters
    {
        return $parameters
            ->setX($x)
            ->setY($y)
            ->setZ($z);
    }
}