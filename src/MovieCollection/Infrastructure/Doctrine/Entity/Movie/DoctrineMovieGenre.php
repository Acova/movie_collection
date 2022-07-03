<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Doctrine\Entity\Movie;

use App\MovieCollection\Domain\Model\Movie\MovieGenre;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'movie_genre')]
class DoctrineMovieGenre
{
    #[ORM\Id]
    #[ORM\Column(name: 'genre_id', type: Types::INTEGER)]
    private int $genre_id;

    #[ORM\Column(name: 'genre_name', type: Types::STRING)]
    private string $genre_name;

    #[ORM\ManyToMany(targetEntity: DoctrineMovie::class, mappedBy: 'movie_genres')]
    private Collection $movies;

    public function getMovieGenreModel() {
        $genre = new MovieGenre();
        $genre->setGenreId($this->genre_id);
        $genre->setGenreName($this->genre_name);
        
        return $genre;
    }

    public function __construct()
    {
        $this->movies = new ArrayCollection();
    }

    public function getGenreId(): ?int
    {
        return $this->genre_id;
    }

    public function getGenreName(): ?string
    {
        return $this->genre_name;
    }

    public function setGenreName(string $genre_name): self
    {
        $this->genre_name = $genre_name;

        return $this;
    }

    /**
     * @return Collection<int, DoctrineMovie>
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }
}

?>