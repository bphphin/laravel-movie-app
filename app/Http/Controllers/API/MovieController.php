<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MovieController extends Controller
{
    public function index() {
        $api_movie_popular = config('api_url.api_movie_popular');
        $api_genre = config('api_url.api_genre');
        $token_movie = config('api_url.movie_token');

        $popularMovie = Http::withToken($token_movie)
        ->get($api_movie_popular)
        ->json()['results'];

        $genreArray = Http::withToken($token_movie)
        ->get($api_genre)
        ->json()['genres'];

        $genres = collect($genreArray)->mapWithKeys(function ($genre) {
            return [
                $genre['id'] => $genre['name']
            ];
        });
        dump($genres);
        dump($popularMovie);

        return view('movies.index',compact('popularMovie','genres'));
    }
}