<?php

namespace App\Http\Livewire;

use App\Models\Movie;
use Livewire\Component;

class SearchWatchlist extends Component
{
    public $term = "";

    public function render()
    {
        sleep(1);
        $movies = Movie::search($this->term)->paginate(10);

        $data = [
            'movies' => $movies,
        ];

        return view('livewire.search-watchlist', $data);
    }
}
