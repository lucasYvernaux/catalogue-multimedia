<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Films') }}
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
                    </form>
                    @isset($search)
                        <p style="font-style: italic">Resultat pour '{{ $search }}'</p>
                    @endisset
                    <h3 class="font-semibold">Titres</h3>
                    <ol>
                        @foreach ($movies as $movie)
                            @if ($movie->titre != '')
                                <li>{{ $movie->titre }}</li>
                            @endif
                        @endforeach
                    </ol>
                    {{ $movies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
