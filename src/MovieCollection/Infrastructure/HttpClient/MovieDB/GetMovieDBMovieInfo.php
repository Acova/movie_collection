<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\HttpClient\MovieDB;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

final class GetMovieDBMovieInfo
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ContainerBagInterface $params
    )
    {

    }

    public function getInfo(int $movieId)
    {
        try 
        {
            $moviedbUrl = $this->params->get('movie_db.url');
            $moviedbKey = $this->params->get('movie_db.key');
            // TODO: Añadir comprobaciones del tipo de respuesta y de los argumentos recibidos
            $response = $this->httpClient->request(
                'GET',
                $moviedbUrl . 'movie/' . $movieId . '?api_key=' . $moviedbKey . '&language=en-US'
            );

            return json_decode($response->getContent(), true);

        } catch (\Exception $e) 
        {
            throw $e;
        }
    }
}

?>