<?php

namespace App\MovieCollection\Domain\Repository;

use App\MovieCollection\Domain\Entity\Movie;

interface UserRepositoryInterface
{
    public function findAll();

    public function save(Movie $movie);
}

?>