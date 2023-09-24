<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{

    public $search = '';
    public function render()
    {
        $searchResult = [];
        $api_search_movie = config('api_url.api_search_movie');
        $token_movie = config('api_url.movie_token');
        if(strlen($this->search) >= 2) {
            $searchResult = Http::withToken($token_movie)
                ->get($api_search_movie."?query=$this->search")
                ->json()['results'];
        }
        $searchResult = collect($searchResult)->take(5);
        // dump($searchResult);
        return view('livewire.search-dropdown',compact('searchResult'));
    }
}