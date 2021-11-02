<?php

namespace App\Tests\UnitTests;

use App\Service\RoverMovementService;
use App\Tests\TestCase;

/**
 * Class TestRoverMovement
 * @coversDefaultClass RoverMovementService
 */
class TestRoverMovement extends TestCase
{
    /**
     * @covers ::moveAction
     */
    public function testMoveAction()
    {
        $roverMovement = new RoverMovementService();

        $width = 5; //x coordinate area
        $height = 5; //y coordinate area

        [$x1, $y1, $z1] = $this->getStartingPoints()[0];
        [$x2, $y2, $z2] = $this->getStartingPoints()[1];

        $instructionsRoverOne = str_split($this->getInstructions()[0]);
        $instructionsRoverTwo = str_split($this->getInstructions()[1]);

        $this->assertEquals('1,3,N', $roverMovement->moveAction($width, $height, $x1, $y1, $z1, $instructionsRoverOne));
        $this->assertEquals('5,1,E', $roverMovement->moveAction($width, $height, $x2, $y2, $z2, $instructionsRoverTwo));
    }

    public function getInstructions(): array
    {
        return ['LMLMLMLMM', 'MMRMMRMRRM'];
    }

    public function getStartingPoints(): array
    {
        return [
            [1, 2, 'N'],
            [3, 3, 'E']
        ];
    }
}