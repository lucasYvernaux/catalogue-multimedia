<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Film') }}
        </h2>
        <a class="text-gray-200" href="{{ url()->previous() }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center font-semibold">Modifier le film {{ $movie->titre }}</h1>
                    <form method="post" action="{{ route('film.edit', ['idFilm' => $movie->id]) }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $movie->id }}">
                        <label for="type">Type :</label>
                        <select name="type">
                            <option value="{{ $movie->type }}">{{ $movie->type }}</option>
                            <option value="DVD">DVD</option>
                            <option value="Blu-Ray">Blu-Ray</option>
                            <option value="DVD-Rom">DVD-Rom</option>
                            <option value="Téléchargé">Téléchargé</option>
                        </select>

                        <label for="titre">Titre *:</label>
                        <input type="text" name="titre" value="{{ $movie->titre }}"/>

                        <label for="duree">Durée :</label>
                        <input type="text" name="duree" value="{{ $movie->duree }}"/>

                        <label for="genres">Genres :</label>
                        <select name="genres">
                            <option value="{{ $movie->genres }}">{{ $movie->genres }}</option>
                            <option value="Comédie">Comédie</option>
                            <option value="Spectacle">Spectacle</option>
                            <option value="Documentaire">Documentaire</option>
                            <option value="Horreur">Horreur</option>
                        </select>

                        <label for="rangement">Rangement :</label>
                        <select name="rangement">
                            <option value="{{ $movie->rangement }}">{{ $movie->rangement }}</option>
                            <option value="Tour">Tour</option>
                            <option value="Album">Album</option>
                            <option value="Disque-dur">Disque-dur</option>
                            <option value="Etuit">Etuit</option>
                        </select>

                        <label for="nbreCD">Nombre de CD :</label>
                        <input type="number" min="0" max="5" name="nbreCD" value="{{ $movie->nbreCD }}/>

                        <label for="fonctionne">Fonctionnel :</label>
                        <select name="fonctionne">
                            <option value="{{ $movie->fonctionne }}">{{ $movie->fonctionne }}</option>
                            <option value="oui">oui</option>
                            <option value="non">non</option>
                            <option value="Non-Testé">Non-Testé</option>
                        </select>

                        <label for="titre_alternatif">Titre alternatif :</label>
                        <input type="text" name="titre_alternatif" value="{{ $movie->titre_alternatif }}"/>

                        <label for="remarques">Remarques :</label>
                        <input type="text" name="remarques" value="{{ $movie->remarques }}"/>

                        <input type="submit" class="bg-indigo-50 border-red-300" value="Modifier"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
