<?php

namespace App\Service\Strategy\Movement;

use App\Service\Strategy\Parameters;

class Movement
{
    protected static $strategy = [];

    public static function init(): void
    {
        self::registerStrategy(new GoForward());
    }

    /**
     * @param MovementStrategyInterface $movement
     */
    protected static function registerStrategy(MovementStrategyInterface $movement): void
    {
        self::$strategy[$movement->getInstruction()] = $movement;
    }

    public static function makeMove(Parameters $parameters)
    {
        return self::getStrategy($parameters->getInstruction())->makeMove(
            $parameters->getWidth(),
            $parameters->getHeight(),
            $parameters->getX(),
            $parameters->getY(),
            $parameters->getZ()
        );
    }

    public static function getStrategy(string $instruction): MovementStrategyInterface
    {
        return self::$strategy[$instruction];
    }
}