<?php

declare(strict_types=1);

namespace App\MovieCollection\Domain\Repository\Movie;

use App\MovieCollection\Domain\Model\Movie\MovieGenre;

interface MovieGenreRepositoryInterface
{
    public function findOrCreate(MovieGenre $movieGenre);
}

?>