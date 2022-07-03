<?php

declare(strict_types=1);

namespace App\MovieCollection\Application\Movie;

use App\MovieCollection\Domain\Repository\Movie\MovieRepositoryInterface;

final class ListMovies 
{
    public function __construct(private MovieRepositoryInterface $movieRepositoryInterface)
    {

    }

    public function __invoke()
    {
        return $this->movieRepositoryInterface->findAll();
    }
}

?>