<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Film Info') }}
        </h2>
        <a class="text-gray-200" href="{{ url()->previous() }}">Back</a>
    </x-slot>

    <div class="py-3">
        <a class="btn btn-outline-secondary" href="/films">
            < Back</a>
                <div class="sm:px-3 lg:px-8">
                    <div class="bg-white overflow-hidden p-2 shadow-sm sm:rounded-lg">
                        <div class="text-gray-900">
                            @auth
                                <a class="text-right w-full block"
                                    href="{{ route('film.edit', ['idFilm' => $movie->id]) }}">Edit</a>
                            @endauth
                            <h1 class="text-center font-semibold text-4xl">Film {{ $movie->titre }}</h1>
                            <section class="flex flex-col-reverse w-full">
                                <section class="w-2/4">
                                    <h1 class="text-xl">Info Interne</h1>
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
                                <hr class="my-2 border w-full" />
                                @isset($result)
                                    @if ($result_size == 1)
                                        <h1 class="text-xl">Info API</h1>
                                        <x-film-card :filmApi="$result" />
                                    @elseif ($result_size == 0)
                                        <h2>NO INFO</h2>
                                    @else
                                        <div id="carouselExample" class="carousel carousel-dark slide">
                                            <div class="carousel-inner">
                                                @foreach ($films->results as $film)
                                                    <div @class(['carousel-item', 'active' => $loop->index == 0])>
                                                        <x-film-card :filmApi="$film" :index="$loop->index" />
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon btn btn-primary"
                                                    aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon btn btn-primary"
                                                    aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                        il y a {{ $result_size }} correspondance
                                    @endif
                                @endisset

                            </section>


                        </div>
                    </div>
                </div>
    </div>
</x-guest-layout>
