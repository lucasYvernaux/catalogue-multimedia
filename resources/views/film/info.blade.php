<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Film Info') }}
        </h2>
        <a class="text-gray-200" href="{{ url()->previous() }}">Back</a>
    </x-slot>

    <div class="py-3">
        <a class="text-black-200" href="/films">
            < Back</a>
                <div class="max-w-7xl  sm:px-3 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="text-gray-900">
                            @auth
                                <a class="text-right w-full block"
                                    href="{{ route('film.edit', ['idFilm' => $movie->id]) }}">Edit</a>
                            @endauth
                            <h1 class="text-center font-semibold text-4xl">Film {{ $movie->titre }}</h1>
                            <section class="flex flex-col-reverse w-full">
                                <section class="w-2/4">
                                    <h1 class="text-xl">Info Intern</h1>
                                    <div class="text-md">
                                        <span class="font-semibold">Type : </span>
                                        <span>{{ $movie->type }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Titre : </span>
                                        <span>{{ $movie->titre }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Durée : </span>
                                        <span>{{ $movie->duree }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Genres : </span>
                                        <span>{{ $movie->genres }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Rangement : </span>
                                        <span>{{ $movie->rangement }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Nombre de CD : </span>
                                        <span>{{ $movie->nbreCD }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Fonctionne : </span>
                                        <span>{{ $movie->fonctionne }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Titre Alternative : </span>
                                        <span>{{ $movie->titre_alternatif }}</span>
                                    </div>
                                    <div class="text-md">
                                        <span class="font-semibold">Remarques : </span>
                                        <span>{{ $movie->remarques }}</span>
                                    </div>
                                </section>
                                <hr class="border" />
                                @isset($result)
                                    <section class="">
                                        <h1 class="text-xl">Info API</h1>

                                        @if ($result_size == 1)
                                            <span>Id :{{ $result->id }}</span>
                                            <div class="flex flex-col sm:flex-row gap-3">
                                                <img src={{ 'https://image.tmdb.org/t/p/original' . $result->poster_path }}
                                                    class="w-2/4 my-2" />
                                                <div class="flex flex-col gap-1">
                                                    <div class="text-md">
                                                        <span class="font-semibold">Titre :</span> {{ $result->title }}
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Titre Original : </span>
                                                        {{ $result->original_title }}
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">VO : </span>
                                                        {{ $result->original_language }}
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Synopsis :</span>
                                                        {{ $result->overview }}
                                                        <script>
                                                            var getCountryNames = new Intl.DisplayNames(['en'], {
                                                                type: 'region'
                                                            });
                                                            console.log(getCountryNames.of('AL'));
                                                        </script>
                                                    </div>

                                                    <div class="text-md">
                                                        <span class="font-semibold">Genres :</span>
                                                        @foreach ($result->genres as $item)
                                                            <span class="">{{ $item->name }},
                                                        @endforeach
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Date de sortie :</span>
                                                        {{ $result->release_date }}
                                                        ({{ date_diff(date_create($result->release_date), date_create(date('Y-m-d')))->format('%y ans') }})
                                                    </div>

                                                    <div class="text-md">
                                                        <span class="font-semibold">Durée :</span> {{ $result->runtime }}
                                                        min
                                                    </div>

                                                    <div class="text-md">
                                                        <span class="font-semibold">Pays d'origine :</span>
                                                        @foreach ($result->origin_country as $country)
                                                            <span class="">{{ $country }},
                                                        @endforeach
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Budget :</span> {{ $result->budget }}
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Revenue :</span> {{ $result->revenue }}
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">Producteur :</span>
                                                        @foreach ($result->production_companies as $prod)
                                                            <p class="flex gap-3">
                                                                <img src={{ 'https://image.tmdb.org/t/p/original' . $prod->logo_path }}
                                                                    class="w-40" alt="{{ 'logo de ' . $prod->name }}" />
                                                                <span class="flex items-center">
                                                                    {{ $prod->name }}
                                                                    ({{ $prod->origin_country }})
                                                                    ,
                                                                </span>
                                                        @endforeach
                                                    </div>
                                                    <div class="text-md">
                                                        <span class="font-semibold">popularity : </span>
                                                        {{ $result->popularity }}
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($result_size == 0)
                                            <h2>NO INFO</h2>
                                        @else
                                            <h2>Trop d'info</h2>
                                            il y a {{ $result_size }} correspondance
                                        @endif
                                    </section>
                                @endisset

                            </section>


                        </div>
                    </div>
                </div>
    </div>
</x-guest-layout>
