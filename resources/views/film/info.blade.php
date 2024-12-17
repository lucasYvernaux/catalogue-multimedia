<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Film Info') }}
        </h2>
        <a class="text-gray-200" href="{{ url()->previous() }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-right w-full block" href="{{ route('film.edit', ['idFilm' => $movie->id]) }}">Edit</a>
                    <h1 class="text-center font-semibold">Film {{ $movie->titre }}</h1>
                    <section>
                        <h1>Info Excel</h1>
                        <div>
                            <span class="font-semibold">Type : </span>
                            <span>{{ $movie->type }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Titre : </span>
                            <span>{{ $movie->titre }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Durée : </span>
                            <span>{{ $movie->duree }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Genres : </span>
                            <span>{{ $movie->genres }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Rangement : </span>
                            <span>{{ $movie->rangement }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Nombre de CD : </span>
                            <span>{{ $movie->nbreCD }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Fonctionne : </span>
                            <span>{{ $movie->fonctionne }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Titre Alternative : </span>
                            <span>{{ $movie->titre_alternatif }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Remarques : </span>
                            <span>{{ $movie->remarques }}</span>
                        </div>
                    </section>
                    <section>
                        <h1>Info APi</h1>
                        <div>
                            <p>title   : {{ $result->title   }}</p>
                        </div>
                        <div>
                            <p>original_title  : {{ $result->original_title  }}</p>
                        </div>
                        <div>
                            <p>overview  : {{ $result->overview  }}</p>
                        </div>
                        <div>
                            <p>original_language  : {{ $result->original_language  }}</p>
                        </div>
                        <div>
                            <p>genres :
                                <ul>
                                    @foreach ($result->genres  as $item)
                                        @foreach ($item as $singleItem)
                                            <li>{{ gettype($singleItem) == 'string' ? $singleItem : '' }}
                                        @endforeach
                                    @endforeach
                                </ul>
                            </p>
                        </div>
                        <div>
                            <p>runtime  : {{ $result->runtime  }}</p>
                        </div>
                        <div>
                            <p>budget  : {{ $result->budget  }}</p>
                        </div>
                        <div>
                            <p>release_date  : {{ $result->release_date  }}</p>
                        </div>
                        <div>
                            <p>popularity  : {{ $result->popularity  }}</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
