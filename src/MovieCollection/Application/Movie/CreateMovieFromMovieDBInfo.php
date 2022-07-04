<?php

declare(strict_types=1);

namespace App\MovieCollection\Application\Movie;

use App\MovieCollection\Domain\Model\Movie\Movie;
use App\MovieCollection\Domain\Model\Movie\MovieGenre;
use App\MovieCollection\Domain\Repository\Movie\MovieRepositoryInterface;
use App\MovieCollection\Infrastructure\HttpClient\MovieDB\GetMovieDBMovieInfo;

final class CreateMovieFromMovieDBInfo
{
    public function __construct(
        private GetMovieDBMovieInfo $getMovieDBMovieInfo,
        private MovieRepositoryInterface $movieRepository
    )
    {

    }

    public function __invoke($moviedb_id) 
    {
        $movie_info = $this->getMovieDBMovieInfo->getInfo($moviedb_id);
        $movie_genres = $movie_info['genres'];

        $movie = new Movie();
        $movie->setMovieId($movie_info['id']);
        $movie->setIsAdult($movie_info['adult']);
        $movie->setMovieBackdropPath($movie_info['backdrop_path']);
        $movie->setOriginalLanguage($movie_info['original_language']);
        $movie->setOriginalTitle($movie_info['original_title']);
        $movie->setOverview($movie_info['overview']);
        $movie->setPopularity($movie_info['popularity']);
        $movie->setPosterPath($movie_info['poster_path']);
        $movie->setReleaseDate(new \DateTime($movie_info['release_date']));
        $movie->setTitle($movie_info['title']);
        $movie->setVideo($movie_info['video']);
        $movie->setVoteAverage($movie_info['vote_average']);
        $movie->setVoteCount($movie_info['vote_count']);

        $movie_genres = $this->getMovieGenres($movie_genres);
        $movie->setGenres($movie_genres);

        $this->movieRepository->save($movie);
    }

    public function getMovieGenres($movieGenres) 
    {
        $result = [];
        foreach($movieGenres as $movieGenre) {
            $movieGenreModel = new MovieGenre();
            $movieGenreModel->setGenreId($movieGenre['id']);
            $movieGenreModel->setGenreName($movieGenre['name']);
            $result[] = $movieGenreModel;
        }
        return $result;
    }

    
}

?>