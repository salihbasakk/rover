<?php

namespace App\Controller;

use App\Helpers\PlateausDB;
use App\Helpers\RoversDB;
use App\Service\RoverMovementService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rover")
 */
class RoverController
{
    /**
     * @Route("/create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $plateauId = $parameters['plateau_id'];

        $plateau = PlateausDB::plateaus()[$plateauId];

        $x = $parameters['x']; //deployment x
        $y = $parameters['y']; //deployment y
        $z = $parameters['z']; //heading direction

        $data = [
            'x' => $x,
            'y' => $y,
            'z' => $z
        ];

        //Just imagine insert DB.
        array_push($data, RoversDB::rovers());

        return new JsonResponse([
            'message' => 'Rover successfully created',
            'data' => [
                'x' => $x,
                'y' => $y,
                'z' => $z,
                'plateau' => $plateau
            ]
        ]);
    }

    /**
     * @Route("/get/{id}", methods={"GET"})
     */
    public function get(int $id): JsonResponse
    {
        return new JsonResponse([
            'data' => [RoversDB::rovers()[$id]]
        ]);
    }

    /**
     * @Route("/get-state/{id}", methods={"GET"})
     */
    public function getState(int $id): JsonResponse
    {
        $rover = RoversDB::rovers()[$id];
        $state = $rover['x'] . ',' . $rover['y'] . ',' . $rover['z'];

        return new JsonResponse([
            'data' => $state
        ]);
    }


    /**
     * @Route("/move", methods={"POST"})
     */
    public function move(Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        $plateauId = $parameters['plateau_id'];
        $roverId = $parameters['rover_id'];
        $instructions = $parameters['instructions'];

        $rover = RoversDB::rovers()[$roverId];
        $plateau = PlateausDB::plateaus()[$plateauId];

        $roverMovement = new RoverMovementService();

        $width = $plateau['width']; //x coordinate area
        $height = $plateau['height']; //y coordinate area

        $x = $rover['x']; //deployment x
        $y = $rover['y']; //deployment y
        $z = $rover['z']; //heading direction

        try {
            return new JsonResponse([
                'data' => $roverMovement->moveAction($width, $height, $x, $y, $z, str_split($instructions))
            ]);
        } catch (\Throwable $e) {
            return new JsonResponse($e->getMessage());
        }
    }
}