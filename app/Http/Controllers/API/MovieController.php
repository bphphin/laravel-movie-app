<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ViewModels\MoviesViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MovieController extends Controller
{
    public function index() {
        $api_movie_popular = config('api_url.api_movie_popular');
        $api_genre = config('api_url.api_genre');
        $token_movie = config('api_url.movie_token');

        $api_now_playing = config('api_url.api_now_playing');

        // Popular movies list
        $popularMovie = Http::withToken($token_movie)
        ->get($api_movie_popular)
        ->json()['results'];

        // Genre movies list
        $genreArray = Http::withToken($token_movie)
        ->get($api_genre)
        ->json()['genres'];

        $genres = collect($genreArray)->mapWithKeys(function ($genre) {
            return [
                $genre['id'] => $genre['name']
            ];
        });


        // Now playing movies list

        $nowPlayingMovie = Http::withToken($token_movie)
            ->get($api_now_playing)
            ->json()['results'];

        $viewModels = new MoviesViewModel($popularMovie, $nowPlayingMovie, $genres);

        return view('movies.index',$viewModels);
        // return view('movies.index',compact('popularMovie','genres','nowPlayingMovie'));
    }


    public function show($id) {
        $token_movie = config('api_url.movie_token');
        $api_movie_details = config('api_url.api_movie_details');

        // Movie details
        $movie = Http::withToken($token_movie)
            ->get($api_movie_details.$id.'?append_to_response=credits,videos,images')
            ->json();
        return view('movies.show',compact('movie'));
    }
}
