<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Doctrine\Repository\Movie;

use App\MovieCollection\Domain\Model\Movie\Movie;
use App\MovieCollection\Domain\Repository\Movie\MovieRepositoryInterface;
use App\MovieCollection\Infrastructure\Doctrine\Entity\Movie\DoctrineMovie;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineMovieRepository implements MovieRepositoryInterface
{

    public function __construct(private EntityManagerInterface $entityManager) 
    {

    }

    public function findAll() : array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder(DoctrineMovie::class);
        $queryBuilder
            ->select('m')
            ->from(DoctrineMovie::class, 'm');
        
        $doctrineMovies = $queryBuilder->getQuery()->getResult();

        $res = [];
        foreach($doctrineMovies as $doctrineMovie) {
            $res[] = $doctrineMovie->getMovieModel();
        }

        return $res;
    }

    public function save(Movie $movie)
    {

    }
}

?>