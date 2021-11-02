<?php

namespace App\Service;

use App\Helpers\ParametersBuilderHelper;
use App\Service\Strategy\Movement\Movement;
use App\Service\Strategy\Movement\GoForward;
use App\Service\Strategy\Spin\Spin;
use App\Service\Strategy\Spin\SpinLeft;
use App\Service\Strategy\Spin\SpinRight;

class RoverMovementService
{
    public function moveAction($width, $height, $x, $y, $z, $instructions): string
    {
        $parameters = ParametersBuilderHelper::buildParameters($width, $height, $x, $y, $z);

        Spin::init();
        Movement::init();

        foreach ($instructions as $instruction) {
            $parameters->setInstruction($instruction);

            if ($instruction == SpinLeft::LEFT || $instruction == SpinRight::RIGHT) {
                $z = (Spin::makeSpin($parameters));
            }

            if ($instruction === GoForward::MOVE) {
                [$x, $y, $z] = Movement::makeMove($parameters);
            }
            $parameters = ParametersBuilderHelper::resetParameters($x, $y, $z, $parameters);
        }
        return $x . ',' . $y . ',' . $z;
    }
}