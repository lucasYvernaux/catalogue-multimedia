<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Film Api Movie DB') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <p>adult : {{ $result->adult }}</p>
                        <p>backdrop_path : {{ $result->backdrop_path }}</p>
                        @foreach ($result->belongs_to_collection  as $index=>$item)
                            <span>{{ $index }} : {{ gettype($item) }}</span> <hr>
                        @endforeach
                        <p>budget  : {{ $result->budget  }}</p>
                        <p>genres :
                            <ul>
                                @foreach ($result->genres  as $item)
                                    @foreach ($item as $singleItem)
                                        <li>{{ gettype($singleItem) == 'string' ? $singleItem : '' }}
                                    @endforeach
                                @endforeach
                            </ul>
                        </p>
                        <p>homepage  : {{ $result->homepage  }}</p>
                        <p>id  : {{ $result->id  }}</p>
                        <p>imdb_id  : {{ $result->imdb_id  }}</p>
                        <p>original_language  : {{ $result->original_language  }}</p>
                        <p>original_title  : {{ $result->original_title  }}</p>
                        <p>overview  : {{ $result->overview  }}</p>
                        <p>popularity  : {{ $result->popularity  }}</p>
                        <p>poster_path  : {{ $result->poster_path  }}</p>
                        @foreach ($result->production_companies  as $index=>$item)
                            <span>{{ $index }} : {{ gettype($item) }}</span> <hr>
                        @endforeach
                        @foreach ($result->production_countries  as $index=>$item)
                            <span>{{ $index }} : {{ gettype($item) }}</span> <hr>
                        @endforeach
                        <p>release_date  : {{ $result->release_date  }}</p>
                        <p>revenue  : {{ $result->revenue  }}</p>
                        <p>runtime  : {{ $result->runtime  }}</p>
                        @foreach ($result->spoken_languages  as $index=>$item)
                            <span>{{ $index }} : {{ gettype($item) }}</span> <hr>
                        @endforeach
                        <p>status  : {{ $result->status  }}</p>
                        <p>tagline  : {{ $result->tagline  }}</p>
                        <p>title   : {{ $result->title   }}</p>
                        <p>video   : {{ $result->video   }}</p>
                        <p>vote_average   : {{ $result->vote_average   }}</p>
                        <p>vote_count   : {{ $result->vote_count   }}</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
