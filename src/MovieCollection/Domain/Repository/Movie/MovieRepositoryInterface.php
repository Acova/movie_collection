<?php

declare(strict_types=1);

namespace App\MovieCollection\Domain\Repository\Movie;

use App\MovieCollection\Domain\Model\Movie\Movie;

interface MovieRepositoryInterface
{
    public function findAll();

    public function save(Movie $movie);
}

?>