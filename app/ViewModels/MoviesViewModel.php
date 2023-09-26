<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{

    public $popularMovie;
    public $nowPlayingMovie;
    public $genres;
    public function __construct($popularMovie, $nowPlayingMovie, $genres)
    {
        $this->popularMovie = $popularMovie;
        $this->nowPlayingMovie = $nowPlayingMovie;
        $this->genres = $genres;
    }

    public function popularMovies() {
        return $this->popularMovie;
    }

    public function nowPlaying() {
        return $this->nowPlayingMovie;
    }

    public function genres() {
        return $this->genres;
    }
}
