<?php

declare(strict_types=1);

namespace App\MovieCollection\Infrastructure\Doctrine\Entity\Movie;

use App\MovieCollection\Domain\Model\Movie\Movie;
use App\MovieCollection\Infrastructure\Doctrine\Entity\Movie\DoctrineMovieGenre;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'movie')]
class DoctrineMovie
{
    #[ORM\Id]
    #[ORM\Column(name: 'movie_id', type: Types::INTEGER)]
    private int $movie_id;

    #[ORM\Column(name: 'is_adult', type: Types::BOOLEAN)]
    private bool $is_adult;

    #[ORM\Column(name: 'movie_backdrop_path', type: Types::STRING)]
    private string $movie_backdrop_path;

    #[ORM\Column(name: 'original_language', type: Types::STRING)]
    private string $original_language;

    #[ORM\Column(name: 'original_title', type: Types::STRING)]
    private string $original_title;

    #[ORM\Column(name: 'overview', type: Types::TEXT)]
    private string $overview;

    #[ORM\Column(name: 'popularity', type: Types::FLOAT)]
    private float $popularity;

    #[ORM\Column(name: 'poster_path', type: Types::STRING)]
    private string $poster_path;

    #[ORM\Column(name: 'release_date', type: Types::DATETIME_MUTABLE)]
    private DateTime $release_date;

    #[ORM\Column(name: 'title', type: Types::STRING)]
    private string $title;

    #[ORM\Column(name: 'video', type: Types::BOOLEAN)]
    private bool $video;

    #[ORM\Column(name: 'vote_average', type: Types::FLOAT)]
    private float $vote_average;

    #[ORM\Column(name: 'vote_count', type: Types::INTEGER)]
    private int $vote_count;

    #[ORM\ManyToMany(targetEntity: DoctrineMovieGenre::class, inversedBy: 'movies')]
    #[ORM\JoinTable(name: 'movie_movie_genre')]
    #[ORM\JoinColumn(name: 'movie_id', referencedColumnName: 'movie_id')]
    #[ORM\InverseJoinColumn(name: 'genre_id', referencedColumnName: 'genre_id')]
    private Collection $movie_genres;

    public function __construct()
    {
        $this->movie_genres = new ArrayCollection();
    }

    public function getMovieModel() : Movie
    {
        $movie = new Movie();
        $movie->setMovieId($this->movie_id);
        $movie->setIsAdult($this->is_adult);
        $movie->setMovieBackdropPath($this->movie_backdrop_path);
        $movie->setOriginalLanguage($this->original_language);
        $movie->setOriginalTitle($this->original_title);
        $movie->setOverview($this->overview);
        $movie->setPopularity($this->popularity);
        $movie->setPosterPath($this->poster_path);
        $movie->setReleaseDate($this->release_date);
        $movie->setTitle($this->title);
        $movie->setVideo($this->video);
        $movie->setVoteAverage($this->vote_average);
        $movie->setVoteCount($this->vote_count);
        $movie->setGenres($this->getGenresModelArray());
        return $movie;
    }

    public static function fromMovieModel(Movie $movie) : DoctrineMovie
    {
        $doctrineMovie = new DoctrineMovie();
        $doctrineMovie->setMovieId($movie->getMovieId());
        $doctrineMovie->setIsAdult($movie->getIsAdult());
        $doctrineMovie->setMovieBackdropPath($movie->getMovieBackdropPath());
        $doctrineMovie->setOriginalLanguage($movie->getOriginalLanguage());
        $doctrineMovie->setOriginalTitle($movie->getOriginalTitle());
        $doctrineMovie->setOverview($movie->getOverview());
        $doctrineMovie->setPopularity($movie->getPopularity());
        $doctrineMovie->setPosterPath($movie->getPosterPath());
        $doctrineMovie->setReleaseDate($movie->getReleaseDate());
        $doctrineMovie->setTitle($movie->getTitle());
        $doctrineMovie->setVideo($movie->getVideo());
        $doctrineMovie->setVoteAverage($movie->getVoteAverage());
        $doctrineMovie->setVoteCount($movie->getVoteCount());

        return $doctrineMovie;
    }

    private function getGenresModelArray() {
        $genres_array = $this->movie_genres->toArray();
        
        $genres_models_array = array_map(function($genre) {
            return $genre->getMovieGenreModel();
        }, $genres_array);

        return $genres_models_array;
    }

    public function getMovieId(): ?int
    {
        return $this->movie_id;
    }

    public function setMovieId($movie_id): self
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    public function isIsAdult(): ?bool
    {
        return $this->is_adult;
    }

    public function setIsAdult(bool $is_adult): self
    {
        $this->is_adult = $is_adult;

        return $this;
    }

    public function getMovieBackdropPath(): ?string
    {
        return $this->movie_backdrop_path;
    }

    public function setMovieBackdropPath(string $movie_backdrop_path): self
    {
        $this->movie_backdrop_path = $movie_backdrop_path;

        return $this;
    }

    public function getOriginalLanguage(): ?string
    {
        return $this->original_language;
    }

    public function setOriginalLanguage(string $original_language): self
    {
        $this->original_language = $original_language;

        return $this;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->original_title;
    }

    public function setOriginalTitle(string $original_title): self
    {
        $this->original_title = $original_title;

        return $this;
    }

    public function getOverview(): ?string
    {
        return $this->overview;
    }

    public function setOverview(string $overview): self
    {
        $this->overview = $overview;

        return $this;
    }

    public function getPopularity(): ?float
    {
        return $this->popularity;
    }

    public function setPopularity(float $popularity): self
    {
        $this->popularity = $popularity;

        return $this;
    }

    public function getPosterPath(): ?string
    {
        return $this->poster_path;
    }

    public function setPosterPath(string $poster_path): self
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(\DateTimeInterface $release_date): self
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function isVideo(): ?bool
    {
        return $this->video;
    }

    public function setVideo(bool $video): self
    {
        $this->video = $video;

        return $this;
    }

    public function getVoteAverage(): ?float
    {
        return $this->vote_average;
    }

    public function setVoteAverage(float $vote_average): self
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    public function getVoteCount(): ?int
    {
        return $this->vote_count;
    }

    public function setVoteCount(int $vote_count): self
    {
        $this->vote_count = $vote_count;

        return $this;
    }

    /**
     * @return Collection<int, DoctrineMovieGenre>
     */
    public function getMovieGenres(): Collection
    {
        return $this->movie_genres;
    }

    public function addMovieGenre(DoctrineMovieGenre $movieGenre): self
    {
        if (!$this->movie_genres->contains($movieGenre)) {
            $this->movie_genres[] = $movieGenre;
        }

        return $this;
    }

    public function removeMovieGenre(DoctrineMovieGenre $movieGenre): self
    {
        $this->movie_genres->removeElement($movieGenre);

        return $this;
    }

    public function setMovieGenres(Collection $movieGenres): self
    {
        $this->movie_genres = $movieGenres;

        return $this;
    }

}

?>