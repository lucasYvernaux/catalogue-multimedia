<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class FilmController extends Controller
{
    /**
     * Display the list of movies.
     */
    public function show(): View
    {
        $films = Film::paginate(25);
        return view('Films', ['movies' => $films]);
    }

    /**
     * Search in the list of movies.
     */
    public function search(Request $request): View
    {
        $search = $request->input('search');
        $query = Film::query();
        if ($search) {
            $query->where('titre', 'LIKE', '%' . $search . '%');
        }
        $films = $query->paginate(15);
        return view('Films', ['movies' => $films, 'search' => $search]);
    }
}
