<?php

declare(strict_types=1);

use App\MovieCollection\Domain\Model\Movie\MovieGenre;
use App\MovieCollection\Infrastructure\Doctrine\Entity\Movie\DoctrineMovieGenre;
use App\MovieCollection\Infrastructure\Doctrine\Repository\Movie\DoctrineMovieGenreRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class DoctrineMovieGenreRepositoryTest extends KernelTestCase
{

    protected function setUp(): void
    {
        self::bootKernel();
        $this->doctrineMovieGenreRepository = self::getContainer()->get(DoctrineMovieGenreRepository::class);
    }

    public function testFindOrCreate(): void
    {
        $movie_genre = $this->generateRandomGenre();
        var_dump($movie_genre);
        $doctrine_movie_genre = $this->doctrineMovieGenreRepository->findOrCreate($movie_genre);
        $this->assertInstanceOf(DoctrineMovieGenre::class, $doctrine_movie_genre);
        $this->assertEquals($movie_genre->getGenreId(), $doctrine_movie_genre->getGenreId());
        $this->assertEquals($movie_genre->getGenreName(), $doctrine_movie_genre->getGenreName());
    }

    private function generateRandomGenre() : MovieGenre
    {
        $movie_genre = new MovieGenre();
        $movie_genre->setGenreId(random_int(0, 200));
        $movie_genre->setGenreName(bin2hex(random_bytes(20)));
        return $movie_genre;
    }
}

?>