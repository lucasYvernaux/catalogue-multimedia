<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Exception;

class FilmController extends Controller
{
    /**
     * Display the list of movies.
     */
    public function show(Request $request): View
    {
        $films = Film::paginate(25);
        if($request->tri)
            $films = Film::query()->orderBy('titre')->paginate(25);
        return view('film.list', ['movies' => $films]);
    }

    /**
     * Search in the list of movies.
     */
    public function search(Request $request): View
    {
        $search = $request->input('search');
        if ($search) {
            $films = Film::query()->where('titre', 'LIKE', '%' . $search . '%')->orderBy('titre')->paginate(15);
        }
        return view('film.list', ['movies' => $films, 'search' => $search]);
    }



    /**
     * Add movies.
     */
    public function addMovie(Request $request): RedirectResponse
    {
        try {
            $film = new Film();

            $film->type = $request->type;
            $film->titre = $request->titre;
            $film->duree = $request->duree;
            $film->genres = $request->genres;
            $film->rangement = $request->rangement;
            $film->nbreCD = $request->nbreCD;
            $film->fonctionne = $request->fonctionne;
            $film->titre_alternatif = $request->titre_alternatif;
            $film->remarques = $request->remarques;

            $film->save();

            return Redirect::route('films');
        } catch (Exception $e) {
            return Redirect::route('dashboard' , ['message' => $e]);
        }
    }


    /**
     * Display one movie.
     */
    public function showMovie($id): View
    {
        $film = Film::findOrFail($id);
        return view('film.info', ['movie' => $film]);
    }

    /**
     * Display the list of movies.
     */
    public function showEditMovie($id): View
    {
        $film = Film::findOrFail($id);
        return view('film.edit', ['movie' => $film]);
    }

    /**
     * Edit movies.
     */
    public function editMovie(Request $request): RedirectResponse
    {
        try {
            $film = Film::findOrFail($request->id);

            $film->type = $request->type;
            $film->titre = $request->titre;
            $film->duree = $request->duree;
            $film->genres = $request->genres;
            $film->rangement = $request->rangement;
            $film->nbreCD = $request->nbreCD;
            $film->fonctionne = $request->fonctionne;
            $film->titre_alternatif = $request->titre_alternatif;
            $film->remarques = $request->remarques;

            $film->save();

            return Redirect::route('film.info', ['idFilm' => $film->id]);
        } catch (Exception $e) {
            Log::debug('test pedro log');
            return Redirect::route('dashboard' , ['message' => $e]);
        }
    }
}
