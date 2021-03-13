<div>
    <div class="px-4 space-y-4 mt-8">
        <form method="get">
            <input class="border-solid border border-gray-300 p-2 w-full md:w-1/4"
                type="text" placeholder="Search Movies" wire:model="term"/>
        </form>
        <div wire:loading>Searching movies...</div>
        <div wire:loading.remove>

        @if ($term == "")
            <div class="text-gray-500 text-sm">
                Enter a term to search for movies.
            </div>
        @else
            @if($movies->isEmpty())
                <div class="text-gray-500 text-sm">
                    No matching result was found.
                </div>
            @else
                @foreach($movies as $movie)
                    <div>
                        <h3 class="text-lg text-gray-900 text-bold">{{$movie->name}}</h3>
                        <p class="text-gray-500 text-sm">{{$movie->title}}</p>
                        <p class="text-gray-500">{{$movie->cast}}</p>
                        <p class="text-gray-500">{{$movie->country}}</p>
                        <p class="text-gray-500">{{$movie->duration}}</p>
                        <p class="text-gray-500">{{$movie->genre}}</p>
                        <p class="text-gray-500">{{$movie->description}}</p>
                    </div>
                @endforeach
            @endif
        @endif
        </div>
    </div>
    <div class="px-4 mt-4">
        {{$movies->links()}}
    </div>
</div>
