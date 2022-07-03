<?php

declare(strict_types=1);

namespace App\MovieCollection\Domain\Model\Movie;

use JsonSerializable;

class MovieGenre implements JsonSerializable
{
    private int $genre_id;

    private string $genre_name;

    private array $movies;

    public function jsonSerialize(): mixed
    {
        return [
            'genre_id' => $this->genre_id,
            'genre_name' => $this->genre_name
        ];
    }

    /**
     * Get the value of genre_id
     *
     * @return  mixed
     */
    public function getGenreId()
    {
        return $this->genre_id;
    }

    /**
     * Set the value of genre_id
     *
     * @param   mixed  $genre_id  
     *
     * @return  self
     */
    public function setGenreId($genre_id)
    {
        $this->genre_id = $genre_id;

        return $this;
    }

    /**
     * Get the value of genre_name
     *
     * @return  mixed
     */
    public function getGenreName()
    {
        return $this->genre_name;
    }

    /**
     * Set the value of genre_name
     *
     * @param   mixed  $genre_name  
     *
     * @return  self
     */
    public function setGenreName($genre_name)
    {
        $this->genre_name = $genre_name;

        return $this;
    }

    /**
     * Get the value of movies
     *
     * @return  mixed
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * Set the value of movies
     *
     * @param   mixed  $movies  
     *
     * @return  self
     */
    public function setMovies($movies)
    {
        $this->movies = $movies;

        return $this;
    }
}

?>