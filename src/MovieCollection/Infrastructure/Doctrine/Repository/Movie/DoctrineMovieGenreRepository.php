<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Doctrine\Repository\Movie;

use App\MovieCollection\Domain\Model\Movie\MovieGenre;
use App\MovieCollection\Domain\Repository\Movie\MovieGenreRepositoryInterface;
use App\MovieCollection\Infrastructure\Doctrine\Entity\Movie\DoctrineMovieGenre;
use Doctrine\ORM\EntityManagerInterface;

final class DoctrineMovieGenreRepository implements MovieGenreRepositoryInterface
{

    public function __construct(private EntityManagerInterface $entityManager)
    {

    }

    public function findOrCreate(MovieGenre $movieGenre)
    {
        $doctrineMovieGenre = $this->getMovieGenre($movieGenre->getGenreId());
        if(!$doctrineMovieGenre) {
            $doctrineMovieGenre = DoctrineMovieGenre::fromMovieGenreModel($movieGenre);
            $this->entityManager->persist($doctrineMovieGenre);
        }

        return $doctrineMovieGenre;
    }

    public function getMovieGenre(int $id) 
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder
            ->select('g')
            ->from(DoctrineMovieGenre::class, 'g')
            ->where(
                $queryBuilder->expr()->eq('g.genre_id', ':genre_id')
            )
            ->setParameter('genre_id', $id);

        $result = $queryBuilder->getQuery()->getResult();
        
        return count($result) > 0 ? $result[0] : null;
    }
}

?>