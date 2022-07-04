<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Api\Movie;

use App\MovieCollection\Application\Movie\CreateMovieFromMovieDBInfo;
use App\MovieCollection\Infrastructure\HttpClient\MovieDB\GetMovieDBMovieInfo;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/movies/create", name="api.movies.create", methods={"POST"})
 */
final class CreateMovieController
{

    public function __construct(
        private CreateMovieFromMovieDBInfo $createMovieFromMovieDBInfo
    )
    {
        
    }

    public function __invoke(Request $request)
    {
        try
        {
            $data = json_decode($request->getContent(), true);
            return new JsonResponse([
                'success' => $this->createMovieFromMovieDBInfo->__invoke($data['moviedb_id'])
            ]);
        } catch (\Exception $e)
        {
            return new JsonResponse([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}

?>