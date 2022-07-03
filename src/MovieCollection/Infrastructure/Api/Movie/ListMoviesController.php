<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Api\Movie;

use App\MovieCollection\Application\Movie\ListMovies;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/movies/", name="api.movies.get", methods={"GET"})
 */
final class ListMoviesController
{

    public function __construct(private ListMovies $listMovies)
    {
        
    }

    public function __invoke(Request $request)
    {
        return new JsonResponse([
            'datos' => $this->listMovies->__invoke()
        ]);
    }
}

?>