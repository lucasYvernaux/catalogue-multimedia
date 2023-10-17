<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Films') }}
        </h2>
        <a class="text-gray-200" href="{{ url()->previous() }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center font-semibold">Ajouter un film à la liste des Yvernaux</h1>
                    <form method="post" action="{{ route('film.add') }}">
                        @csrf
                        <label for="type">Type :</label>
                        <select name="type">
                            <option value="DVD">--Please choose an option--</option>
                            <option value="DVD">DVD</option>
                            <option value="Blu-Ray">Blu-Ray</option>
                            <option value="DVD-Rom">DVD-Rom</option>
                            <option value="Téléchargé">Téléchargé</option>
                        </select>

                        <label for="titre">Titre *:</label>
                        <input type="text" name="titre"/>

                        <label for="duree">Durée :</label>
                        <input type="text" name="duree"/>

                        <label for="genres">Genres :</label>
                        <select name="genres">
                            <option value="Genres">--Please choose an option--</option>
                            <option value="Comédie">Comédie</option>
                            <option value="Spectacle">Spectacle</option>
                            <option value="Documentaire">Documentaire</option>
                            <option value="Horreur">Horreur</option>
                        </select>

                        <label for="rangement">Rangement :</label>
                        <select name="rangement">
                            <option value="Tour">--Please choose an option--</option>
                            <option value="Tour">Tour</option>
                            <option value="Album">Album</option>
                            <option value="Disque-dur">Disque-dur</option>
                            <option value="Etuit">Etuit</option>
                        </select>

                        <label for="nbreCD">Nombre de CD :</label>
                        <input type="number" min="0" max="5" name="nbreCD"/>

                        <label for="fonctionne">Fonctionnel :</label>
                        <select name="fonctionne">
                            <option value="Non-Testé">--Please choose an option--</option>
                            <option value="oui">oui</option>
                            <option value="non">non</option>
                            <option value="Non-Testé">Non-Testé</option>
                        </select>

                        <label for="titre_alternatif">Titre alternatif :</label>
                        <input type="text" name="titre_alternatif"/>

                        <label for="remarques">Remarques :</label>
                        <input type="text" name="remarques"/>

                        <input type="submit" class="bg-indigo-50 border-red-300"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
