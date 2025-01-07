<section>
    <span class="hidden">Id :{{ $filmApi->id }}</span>

    <div class="card flex-row p-3">
        <img src={{ 'https://image.tmdb.org/t/p/w500' . $filmApi->poster_path }} class="card-img-top m-auto"
            style="max-height: 720px; max-width: 500px" alt={{ 'Affiche du film ' . $filmApi->title }} />
        <div class="card-body">
            <h5 class="card-title">
                @isset($filmApi->title)
                    {{ $index + 1 }}. {{ $filmApi->title }}
                @else
                    Titre pas trouvé
                @endisset
            </h5>
            <p class="card-text">
                @isset($filmApi->overview)
                    {{ $filmApi->overview }}
                @else
                    Pas de Synopsys
                @endisset
            </p>
            <ul class="list-group list-group-flush">
                @isset($filmApi->original_title)
                    <li class="list-group-item">
                        <span class="font-semibold">Titre Original : </span>
                        {{ $filmApi->original_title }}
                    </li>
                @endisset
                @isset($filmApi->original_language)
                    <li class="list-group-item">
                        <span class="font-semibold">VO : </span>
                        {{ $lang }}
                    </li>
                @endisset
                @isset($filmApi->genres)<li class="list-group-item">
                        <span class="font-semibold">Genres :</span>
                        @foreach ($filmApi->genres as $item)
                            @if ($loop->last)
                                <span>{{ $item->name }}</span>
                            @else
                                <span>{{ $item->name }} {{ $loop->last ? '' : ', ' }} </span>
                            @endif
                        @endforeach
                    </li>
                @endisset
                @isset($filmApi->release_date)
                    <li class="list-group-item">
                        <span class="font-semibold">Date de sortie :</span>
                        {{ $filmApi->release_date }}
                        (Il y a {{ $temps }})
                    </li>
                @endisset
                @isset($filmApi->runtime)
                    <li class="list-group-item">
                        <span class="font-semibold">Durée :</span>
                        {{ $duree }}
                    </li>
                @endisset
                @isset($filmApi->origin_country)<li class="list-group-item">
                        <span class="font-semibold">Pays d'origine :</span>
                        @foreach ($countries as $country)
                            @if ($loop->last)
                                <span>{{ $country }}</span>
                            @else
                                <span>{{ $country }} {{ $loop->last ? '' : ', ' }} </span>
                            @endif
                        @endforeach
                </li>@endisset
                @isset($filmApi->budget)
                    <li class="list-group-item">
                        <span class="font-semibold">Budget :</span>
                        {{ $filmApi->budget }}
                    </li>
                @endisset
                @isset($filmApi->revenue)
                    <li class="list-group-item">
                        <span class="font-semibold">Revenue :</span>
                        {{ $filmApi->revenue }}
                    </li>
                @endisset
                @isset($filmApi->production_companies)<li class="list-group-item">
                        <span class="font-semibold">Producteur :</span>
                        @foreach ($filmApi->production_companies as $prod)
                            <p class="flex gap-3">
                                <img src={{ 'https://image.tmdb.org/t/p/original' . $prod->logo_path }} class="w-40"
                                    alt="{{ 'logo de ' . $prod->name }}" />
                                <span class="flex items-center">
                                    {{ $prod->name }}
                                    ({{ $prod->origin_country }})
                                    {{ $loop->last ? '' : ',' }}
                                </span>
                        @endforeach
                </li> @endisset
                @isset($filmApi->popularity)
                    <li class="list-group-item">
                        <span class="font-semibold">popularity : </span>
                        {{ $filmApi->popularity }}
                    </li>
                @endisset
            </ul>
        </div>
    </div>
</section>
