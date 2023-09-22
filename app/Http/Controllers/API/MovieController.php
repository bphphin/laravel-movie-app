<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class MovieController extends Controller
{
    public function index() {
        $api_movie_popular = config('api_url.api_movie_popular');
        $token_movie = config('api_url.movie_token');
        $popularMovie = Http::withToken($token_movie)
        ->get($api_movie_popular)
        ->json()['results'];
        // dump($popularMovie);
        return view('movies.index',compact('popularMovie'));
    }
}