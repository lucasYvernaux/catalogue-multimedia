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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
