<?php

namespace App\Controller;

use App\Helpers\PlateausDB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/plateau")
 */
class PlateauController
{
    /**
     * @Route("/create", methods={"POST"})
     */
    public function create(Request $request): JsonResponse
    {
        $parameters = json_decode($request->getContent(), true);

        if (!is_int($parameters['width'] && !is_int($parameters['height']))) {
             return new JsonResponse('X and Y parameters should be integer!', 400);
        }

        $data = [
            'width' => $parameters['width'],
            'height' => $parameters['height']
        ];

        //Just imagine insert DB.
        array_push($data, PlateausDB::plateaus());

        return new JsonResponse([
            'message' => 'Plateau successfully created',
            'data' => $data
        ]);
    }

    /**
     * @Route("/get/{id}", methods={"GET"})
     */
    public function get(int $id): JsonResponse
    {
        return new JsonResponse([
            'data' => [PlateausDB::plateaus()[$id]]
        ]);
    }
}