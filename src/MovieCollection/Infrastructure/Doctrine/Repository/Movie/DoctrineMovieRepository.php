<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Doctrine\Repository\Movie;

use App\MovieCollection\Domain\Model\Movie\Movie;
use App\MovieCollection\Domain\Repository\Movie\MovieGenreRepositoryInterface;
use App\MovieCollection\Domain\Repository\Movie\MovieRepositoryInterface;
use App\MovieCollection\Infrastructure\Doctrine\Entity\Movie\DoctrineMovie;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineMovieRepository implements MovieRepositoryInterface
{

    public function __construct(
        private EntityManagerInterface $entityManager,
        private MovieGenreRepositoryInterface $movieGenreRepository
    ) 
    {

    }

    public function findAll() : array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
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
        $doctrineGenres = $this->getDoctrineGenres($movie->getGenres());
        $doctrineMovie = DoctrineMovie::fromMovieModel($movie);
        $doctrineMovie->setMovieGenres(new ArrayCollection($doctrineGenres));
        $this->entityManager->persist($doctrineMovie);
        $this->entityManager->flush();
    }

    private function getDoctrineGenres($modelGenres)
    {
        $genres = [];
        foreach($modelGenres as $genre) 
        {
            $genres[] = $this->movieGenreRepository->findOrCreate($genre);
        }

        return $genres;
    }
}

?>