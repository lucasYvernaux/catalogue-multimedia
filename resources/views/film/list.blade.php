<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ !empty($search) ? __('Result Search') : __('Films') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-center font-semibold">Liste des films des Yvernaux</h1>
                    <form method="post" action="/films">
                        @csrf
                        <label for="search">Rechercher :</label>
                        <input type="text" name="search"/>
                        <input type="submit" class="bg-indigo-50 border-red-300"/>
                        <a href="{{ route('film.add') }}">add</a>
                    </form>
                    @isset($search)
                        <p style="font-style: italic">Resultat pour '{{ $search }}'</p>
                    @endisset
                    <h3 class="font-semibold">Titres</h3>
                    <ol>
                        @forelse ($movies as $movie)
                            @if ($movie->titre != '')
                        <li><a href="{{ route('film.info', ['idFilm' => $movie->id]) }}">{{ $movie->titre }}</a></li>
                            @endif
                        @empty
                            <h2 class="font-semibold text-center"> Pas de résultat pour {{ $search }}</h2>
                        @endforelse
                    </ol>
                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>