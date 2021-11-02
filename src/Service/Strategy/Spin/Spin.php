<?php

namespace App\Service\Strategy\Spin;

use App\Service\Strategy\Parameters;

class Spin
{
    protected static $strategy = [];

    public static function init(): void
    {
        self::registerStrategy(new SpinLeft());
        self::registerStrategy(new SpinRight());
    }

    /**
     * @param SpinStrategyInterface $spin
     */
    protected static function registerStrategy(SpinStrategyInterface $spin): void
    {
        self::$strategy[$spin->getInstruction()] = $spin;
    }

    public static function makeSpin(Parameters $parameters): string
    {
        return self::getStrategy($parameters->getInstruction())->makeSpin($parameters->getZ());
    }

    public static function getStrategy(string $instruction): SpinStrategyInterface
    {
        return self::$strategy[$instruction];
    }
}