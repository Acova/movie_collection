<?php

declare(strict_types=1);

namespace App\MovieCollection\Domain\Model\Movie;

use DateTime;
use JsonSerializable;

class Movie implements JsonSerializable
{
    private int $movie_id;

    private bool $is_adult;

    private string $movie_backdrop_path;

    private string $original_language;

    private string $original_title;

    private string $overview;

    private float $popularity;

    private string $poster_path;

    private DateTime $release_date;

    private string $title;

    private bool $video;

    private float $vote_average;

    private int $vote_count;

    public function jsonSerialize(): mixed
    {
        return [
            'movie_id' => $this->movie_id,
            'is_adult' => $this->is_adult,
            'movie_backdrop_path' => $this->movie_backdrop_path,
            'original_language' => $this->original_language,
            'original_title' => $this->original_title,
            'overview' => $this->overview,
            'popularity' => $this->popularity,
            'poster_path' => $this->poster_path,
            'release_date' => $this->release_date->format('Y-m-d'),
            'title' => $this->title,
            'video' => $this->video,
            'vote_average' => $this->vote_average,
            'vote_count' => $this->vote_count
        ];
    }

    /**
     * Get the value of movie_id
     *
     * @return  mixed
     */
    public function getMovieId()
    {
        return $this->movie_id;
    }

    /**
     * Set the value of movie_id
     *
     * @param   mixed  $movie_id  
     *
     * @return  self
     */
    public function setMovieId($movie_id)
    {
        $this->movie_id = $movie_id;

        return $this;
    }

    /**
     * Get the value of is_adult
     *
     * @return  mixed
     */
    public function getIsAdult()
    {
        return $this->is_adult;
    }

    /**
     * Set the value of is_adult
     *
     * @param   mixed  $is_adult  
     *
     * @return  self
     */
    public function setIsAdult($is_adult)
    {
        $this->is_adult = $is_adult;

        return $this;
    }

    /**
     * Get the value of movie_backdrop_path
     *
     * @return  mixed
     */
    public function getMovieBackdropPath()
    {
        return $this->movie_backdrop_path;
    }

    /**
     * Set the value of movie_backdrop_path
     *
     * @param   mixed  $movie_backdrop_path  
     *
     * @return  self
     */
    public function setMovieBackdropPath($movie_backdrop_path)
    {
        $this->movie_backdrop_path = $movie_backdrop_path;

        return $this;
    }

    /**
     * Get the value of original_language
     *
     * @return  mixed
     */
    public function getOriginalLanguage()
    {
        return $this->original_language;
    }

    /**
     * Set the value of original_language
     *
     * @param   mixed  $original_language  
     *
     * @return  self
     */
    public function setOriginalLanguage($original_language)
    {
        $this->original_language = $original_language;

        return $this;
    }

    /**
     * Get the value of original_title
     *
     * @return  mixed
     */
    public function getOriginalTitle()
    {
        return $this->original_title;
    }

    /**
     * Set the value of original_title
     *
     * @param   mixed  $original_title  
     *
     * @return  self
     */
    public function setOriginalTitle($original_title)
    {
        $this->original_title = $original_title;

        return $this;
    }

    /**
     * Get the value of overview
     *
     * @return  mixed
     */
    public function getOverview()
    {
        return $this->overview;
    }

    /**
     * Set the value of overview
     *
     * @param   mixed  $overview  
     *
     * @return  self
     */
    public function setOverview($overview)
    {
        $this->overview = $overview;

        return $this;
    }

    /**
     * Get the value of popularity
     *
     * @return  mixed
     */
    public function getPopularity()
    {
        return $this->popularity;
    }

    /**
     * Set the value of popularity
     *
     * @param   mixed  $popularity  
     *
     * @return  self
     */
    public function setPopularity($popularity)
    {
        $this->popularity = $popularity;

        return $this;
    }

    /**
     * Get the value of poster_path
     *
     * @return  mixed
     */
    public function getPosterPath()
    {
        return $this->poster_path;
    }

    /**
     * Set the value of poster_path
     *
     * @param   mixed  $poster_path  
     *
     * @return  self
     */
    public function setPosterPath($poster_path)
    {
        $this->poster_path = $poster_path;

        return $this;
    }

    /**
     * Get the value of release_date
     *
     * @return  mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * Set the value of release_date
     *
     * @param   mixed  $release_date  
     *
     * @return  self
     */
    public function setReleaseDate($release_date)
    {
        $this->release_date = $release_date;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return  mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param   mixed  $title  
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of video
     *
     * @return  mixed
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set the value of video
     *
     * @param   mixed  $video  
     *
     * @return  self
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get the value of vote_average
     *
     * @return  mixed
     */
    public function getVoteAverage()
    {
        return $this->vote_average;
    }

    /**
     * Set the value of vote_average
     *
     * @param   mixed  $vote_average  
     *
     * @return  self
     */
    public function setVoteAverage($vote_average)
    {
        $this->vote_average = $vote_average;

        return $this;
    }

    /**
     * Get the value of vote_count
     *
     * @return  mixed
     */
    public function getVoteCount()
    {
        return $this->vote_count;
    }

    /**
     * Set the value of vote_count
     *
     * @param   mixed  $vote_count  
     *
     * @return  self
     */
    public function setVoteCount($vote_count)
    {
        $this->vote_count = $vote_count;

        return $this;
    }
}