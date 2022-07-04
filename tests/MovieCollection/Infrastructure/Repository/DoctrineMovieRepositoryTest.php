<?php

declare(strict_types=1);

use App\MovieCollection\Domain\Model\Movie\Movie;
use App\MovieCollection\Infrastructure\Doctrine\Repository\Movie\DoctrineMovieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DoctrineMovieRepositoryTest extends KernelTestCase
{

    protected function setUp(): void
    {
        self::bootKernel();
        $this->doctrineMovieRepository = self::getContainer()->get(DoctrineMovieRepository::class);
    }

    public function testFindAll(): void
    {
        $movies = $this->doctrineMovieRepository->findAll();
        foreach($movies as $movie) 
        {
            $this->assertInstanceOf(Movie::class, $movie, "DoctrineMovieRepository:findAll(). Debe devolver un array de elementos DoctrineMovie");
        }
    }
}

?>