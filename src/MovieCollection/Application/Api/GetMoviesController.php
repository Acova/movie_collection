<?php

namespace App\MovieCollection\Application\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/movies/", name="api.movies.get", methods={"GET"})
 */
final class GetMoviesController extends AbstractController 
{
    public function __invoke(Request $request)
    {
        return new JsonResponse([
            'datos' => 'Hola mundo'
        ]);
    }
}

?>